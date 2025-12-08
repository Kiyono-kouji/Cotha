<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Method;
use App\Models\Project;
use App\Models\Testimonial;
use App\Services\ProjectSyncService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $methods = Method::where('active', true)->get();
        $testimonials = Testimonial::where('isFeatured', true)->where('active', true)->latest()->take(6)->get();
        $levels = Level::where('active', true)->where('isFeatured', true)->get();

        $apiKey = env('API_KEY');

        // Auto-sync if needed
        if ($apiKey) {
            $syncService = new ProjectSyncService();
            if ($syncService->shouldSync()) {
                $syncService->sync($apiKey);
            }
        }

        // Read from DB
        $apiProjects = Project::where('active', true)
            ->where('is_featured', true)
            ->orderByDesc('project_date')
            ->take(6)
            ->get()
            ->map(fn ($p) => [
                'id' => $p->id,
                'title' => $p->title,
                'user' => ['name' => $p->creator],
                'thumbnail' => $p->thumbnail,
                'url' => $p->url,
                'created_at' => optional($p->project_date)->toIso8601String(),
            ])
            ->toArray();

        $projects = Project::where('is_featured', true)
            ->where('active', true)
            ->orderBy('project_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('welcome', compact('methods', 'testimonials', 'levels', 'projects', 'apiProjects'));
    }
}
