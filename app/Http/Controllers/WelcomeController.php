<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Method;
use App\Models\Partner;
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
        $partners = Partner::latest()->get();

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
            ->map(fn($p) => (object)[
                'id' => $p->id,
                'title' => $p->title,
                'creator' => $p->creator,
                'thumbnail' => $p->thumbnail,
                'url' => $p->url,
                'is_featured' => $p->is_featured,
                'project_date' => $p->project_date,
                'profile_picture' => $p->profile_picture,
                'school' => $p->school,
                'age' => $p->age,
            ]);

        return view('welcome', [
            'methods' => $methods,
            'testimonials' => $testimonials,
            'levels' => $levels,
            'projects' => $apiProjects,
            'partners' => $partners,
        ]);
    }
}
