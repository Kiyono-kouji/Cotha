<?php

namespace App\Services;

use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectSyncService
{
    public function sync(string $apiKey): void
    {
        try {
            // Local overrides keyed by normalized title+creator
            $overrides = Project::get()->keyBy(function ($p) {
                return Str::lower(trim($p->title)).'|'.Str::lower(trim($p->creator));
            });

            $client = new Client(['timeout' => 6, 'verify' => false]);
            $resp = $client->get("https://comfypace.com/api/student-projects?api_key={$apiKey}");
            $payload = json_decode($resp->getBody(), true);
            $items = $payload['data'] ?? [];

            $rows = [];
            foreach ($items as $p) {
                $active = $p['active'] ?? $p['is_active'] ?? $p['isActive'] ?? true;
                $featured = $p['is_featured'] ?? $p['featured'] ?? $p['isFeatured'] ?? false;

                $title = trim($p['title'] ?? '');
                $creator = trim(($p['user']['name'] ?? $p['creator'] ?? ''));
                $key = Str::lower($title).'|'.Str::lower($creator);

                // Apply local overrides
                if (isset($overrides[$key])) {
                    $active = $overrides[$key]->active;
                    $featured = $overrides[$key]->is_featured;
                }

                if (!$active) continue;

                $rows[] = [
                    'id' => (int)($p['id'] ?? 0),
                    'title' => $title ?: 'Untitled',
                    'creator' => $creator ?: null,
                    'thumbnail' => $p['thumbnail'] ?? null,
                    'url' => $p['url'] ?? null,
                    'is_featured' => (bool)$featured,
                    'active' => (bool)$active,
                    'project_date' => isset($p['created_at']) ? Carbon::parse($p['created_at']) : null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ];
            }

            if (!empty($rows)) {
                Project::upsert(
                    $rows,
                    ['id'],
                    ['title','creator','thumbnail','url','is_featured','active','project_date','updated_at']
                );
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function shouldSync(): bool
    {
        $lastSyncStr = Project::max('updated_at');
        $lastSync = $lastSyncStr ? Carbon::parse($lastSyncStr) : null;
        return !$lastSync || $lastSync->lt(now()->subDays(7));
    }
}