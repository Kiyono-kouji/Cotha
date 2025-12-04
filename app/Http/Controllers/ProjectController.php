<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function getprojects(Request $request)
    {
        $apiKey = env('API_KEY');
        $page = $request->input('page', 1);
        $perPage = 12;

        $client = new \GuzzleHttp\Client();
        $apiUrl = "https://comfypace.com/api/student-projects?api_key={$apiKey}";

        try {
            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody(), true);

            $all = $data['data'] ?? [];

            // Local overrides keyed by normalized title+creator
            $overrides = \App\Models\Project::get()->keyBy(function ($p) {
                return Str::lower(trim($p->title)).'|'.Str::lower(trim($p->creator));
            });

            $filtered = [];
            foreach ($all as $p) {
                $active = $p['active'] ?? $p['is_active'] ?? $p['isActive'] ?? true;
                $featured = $p['is_featured'] ?? $p['featured'] ?? $p['isFeatured'] ?? true;

                $title = trim($p['title'] ?? '');
                $creator = trim(($p['user']['name'] ?? $p['creator'] ?? ''));
                $key = Str::lower($title).'|'.Str::lower($creator);

                // For PROJECTS: only apply local active override
                if (isset($overrides[$key])) {
                    if (!$overrides[$key]->active) {
                        continue; // hidden locally => hide on projects page
                    }
                }

                // Projects page shows all active (ignore featured)
                if ($active) {
                    $filtered[] = $p;
                }
            }

            $total = count($filtered);
            $projects = array_slice($filtered, ($page - 1) * $perPage, $perPage);

            $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                $projects,
                $total,
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );

            return view('projects', ['projects' => $paginator]);
        } catch (\Exception $e) {
            return view('errorpage', [
                'projects' => [],
                'error' => 'Unable to fetch projects at this time. ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('active', true)->latest()->paginate(12);
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Sync featured+active projects from API into local DB.
     * Upserts by unique (title, creator) pair.
     */
    public function syncFromApi(Request $request)
    {
        $apiKey = env('API_KEY');
        if (!$apiKey) {
            return back()->with('error', 'API_KEY is not configured.');
        }

        $client = new Client(['timeout' => 10]);
        $apiUrl = "https://comfypace.com/api/student-projects?api_key={$apiKey}";

        try {
            $resp = $client->get($apiUrl);
            $payload = json_decode($resp->getBody(), true);
            $items = $payload['data'] ?? [];

            // Filter active + featured (support key variants)
            $items = array_filter($items, function ($p) {
                $active = $p['active'] ?? $p['is_active'] ?? $p['isActive'] ?? true;
                $featured = $p['is_featured'] ?? $p['featured'] ?? $p['isFeatured'] ?? true;
                return (bool)$active && (bool)$featured;
            });

            $count = 0;

            DB::beginTransaction();
            foreach ($items as $p) {
                $title = $p['title'] ?? null;
                $creator = data_get($p, 'user.name') ?? data_get($p, 'creator') ?? 'Unknown';

                if (!$title) {
                    continue;
                }

                // Map fields
                $image = $p['thumbnail'] ?? null; // if you prefer storing the remote thumbnail filename/url
                $creatorGrade = $p['user']['grade'] ?? null;
                $date = $p['created_at'] ?? null;

                // Upsert by title+creator (adjust if you have a better unique key)
                \App\Models\Project::updateOrCreate(
                    ['title' => $title, 'creator' => $creator],
                    [
                        'image' => $image, // if you store local images, replace with downloaded filename logic
                        'creator_grade' => $creatorGrade,
                        'date' => $date ? \Carbon\Carbon::parse($date)->toDateString() : null,
                        'isFeatured' => true,
                        'active' => true,
                    ]
                );

                $count++;
            }
            DB::commit();

            return back()->with('success', "Synced {$count} projects from API.");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'API sync failed: '.$e->getMessage());
        }
    }
}
