<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectSyncService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display paginated list of all active projects from DB.
     * Syncs from API if last sync > 7 days.
     */
    public function getprojects(Request $request)
    {
        $apiKey = env('API_KEY');

        // Auto-sync if needed
        if ($apiKey) {
            $syncService = new ProjectSyncService();
            if ($syncService->shouldSync()) {
                $syncService->sync($apiKey);
            }
        }

        // Read from DB (synced weekly)
        $projects = Project::where('active', true)
            ->orderByDesc('project_date')
            ->paginate(12)
            ->through(fn ($p) => [
                'id' => $p->id,
                'title' => $p->title,
                'user' => ['name' => $p->creator],
                'thumbnail' => $p->thumbnail,
                'url' => $p->url,
                'created_at' => optional($p->project_date)->toIso8601String(),
            ]);

        return view('projects', ['projects' => $projects]);
    }

    /**
     * Manual sync trigger from admin panel
     */
    public function syncFromApi(Request $request)
    {
        $apiKey = env('API_KEY');

        if (!$apiKey) {
            return redirect()->route('admin.projects.index')->with('error', 'API key not configured.');
        }

        try {
            $syncService = new ProjectSyncService();
            $syncService->sync($apiKey);
            return redirect()->route('admin.projects.index')->with('success', 'Projects synced successfully!');
        } catch (\Throwable $e) {
            return redirect()->route('admin.projects.index')->with('error', 'Sync failed: ' . $e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $projects = Project::where('active', true)->latest()->paginate(12);
    //     return view('projects', compact('projects'));
    // }

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
