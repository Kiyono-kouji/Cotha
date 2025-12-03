<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

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
        return view('admin.albums.create');
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
                    $path = $mediaInput['file']->store('albums', 'public');
                    $album->media()->create([
                        'type' => $mediaInput['type'],
                        'file' => $path,
                        'caption' => $mediaInput['caption'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.albums.show', $album->id)->with('success', 'Album and media created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with('media')->findOrFail($id);
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('admin.albums.edit', compact('album'));
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
        return redirect()->route('admin.albums.index')->with('success', 'Album updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Album deleted!');
    }
}
