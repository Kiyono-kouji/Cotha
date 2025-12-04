<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Method;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index()
    {
        $methods = Method::where('active', true)->get();
        $testimonials = Testimonial::where('isFeatured', true)->where('active', true)->latest()->take(6)->get();
        $levels = Level::where('active', true)->where('isFeatured', true)->get();

        $apiProjects = [];
        $apiKey = env('API_KEY');

        // Local overrides keyed by normalized title+creator
        $overrides = Project::get()->keyBy(function ($p) {
            return Str::lower(trim($p->title)).'|'.Str::lower(trim($p->creator));
        });

        if ($apiKey) {
            try {
                $client = new Client(['timeout' => 6, 'verify' => false]);
                $resp = $client->get("https://comfypace.com/api/student-projects?api_key={$apiKey}");
                $payload = json_decode($resp->getBody(), true);
                $items = $payload['data'] ?? [];

                $filtered = [];
                foreach ($items as $p) {
                    $active = $p['active'] ?? $p['is_active'] ?? $p['isActive'] ?? true;
                    $featured = $p['is_featured'] ?? $p['featured'] ?? $p['isFeatured'] ?? true;

                    $title = trim($p['title'] ?? '');
                    $creator = trim(($p['user']['name'] ?? $p['creator'] ?? ''));
                    $key = Str::lower($title).'|'.Str::lower($creator);

                    // Check local overrides
                    if (isset($overrides[$key])) {
                        // If locally inactive => hide from both home and projects
                        if (!$overrides[$key]->active) {
                            continue;
                        }
                        // If locally unfeatured => hide from home only
                        if (!$overrides[$key]->isFeatured) {
                            continue;
                        }
                    }

                    if ($active && $featured) {
                        $filtered[] = $p;
                    }
                }

                $apiProjects = array_slice($filtered, 0, 6);
            } catch (\Throwable $e) {
                // fallback below
            }
        }

        // Fallback: local featured+active
        $projects = Project::where('isFeatured', true)
            ->where('active', true)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('welcome', compact('methods', 'testimonials', 'levels', 'projects', 'apiProjects'));
    }
}
