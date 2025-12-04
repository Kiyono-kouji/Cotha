<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function getprojects(Request $request)
    {
        $apiKey = env('API_KEY');
        $page = $request->input('page', 1);
        $perPage = 12;

        $client = new Client();
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

                // Check local overrides - if inactive locally, hide from projects page
                if (isset($overrides[$key])) {
                    if (!$overrides[$key]->active) {
                        continue; // hidden locally => hide on projects page
                    }
                }

                // Projects page shows all active items (featured or not)
                if ($active) {
                    $filtered[] = $p;
                }
            }

            $total = count($filtered);
            $projects = array_slice($filtered, ($page - 1) * $perPage, $perPage);

            $paginator = new LengthAwarePaginator(
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
}
