<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allPartners = \App\Models\Partner::all();
        return view('admin.albums.create', compact('allPartners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media.*.type' => 'required_with:media.*.file|in:image,video',
            'media.*.file' => 'nullable|file|max:10240',
            'media.*.caption' => 'nullable|string|max:255',
        ]);

        $album = Album::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        if ($request->has('media')) {
            foreach ($request->media as $mediaInput) {
                if (isset($mediaInput['file'])) {
                    $path = $mediaInput['file']->store('Albums', 'public'); // changed to 'Albums'
                    $album->media()->create([
                        'type' => $mediaInput['type'],
                        'file' => $path,
                        'caption' => $mediaInput['caption'] ?? null,
                    ]);
                }
            }
        }

        if (!empty($request->partners)) {
            $album->partners()->sync($request->partners);
        }

        return redirect()->route('admin.albums.show', $album->id)->with('success', 'Album and media created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with(['media', 'partners'])->findOrFail($id);
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $allPartners = Partner::all();
        return view('admin.albums.edit', compact('album', 'allPartners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $album->update($validated);

        if (!empty($request->partners)) {
            $album->partners()->sync($request->partners);
        }

        return redirect()->route('admin.albums.index')->with('success', 'Album updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->partners()->detach(); // Remove links, do not delete partners

        // Delete all media files associated with this album
        foreach ($album->media as $media) {
            Storage::disk('public')->delete($media->file);
        }

        $album->delete();

        return redirect()->route('admin.albums.index')->with('success', 'Album and all associated media deleted!');
    }
}
