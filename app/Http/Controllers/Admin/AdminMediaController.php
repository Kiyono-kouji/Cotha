<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $album_id = $request->input('album_id');
        $album = Album::findOrFail($album_id);
        return view('admin.media.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'type' => 'required|in:image,video,youtube',
            'file' => 'required_if:type,image,video|file|max:10240',
            'youtube_url' => 'required_if:type,youtube|url',
            'caption' => 'nullable|string|max:255',
        ]);

        $album_id = $validated['album_id'];

        if ($validated['type'] === 'youtube') {
            // Extract YouTube video ID
            $url = $validated['youtube_url'];
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $url, $match);
            $videoId = $match[1] ?? null;
            
            if (!$videoId) {
                return redirect()->back()->with('error', 'Invalid YouTube URL!');
            }
            
            $validated['file'] = $videoId; // Store video ID instead of file path
        } else {
            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('Albums', 'public');
                $validated['file'] = $path;
            } else {
                return redirect()->route('admin.albums.show', $album_id)->with('error', 'File upload failed!');
            }
        }

        Media::create([
            'album_id' => $album_id,
            'type' => $validated['type'],
            'file' => $validated['file'],
            'caption' => $validated['caption'] ?? null,
        ]);

        return redirect()->route('admin.albums.show', $album_id)->with('success', 'Media added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($media->file);
            $path = $request->file('file')->store('Albums', 'public');
            $media->file = $path;
        }
        $media->caption = $validated['caption'];
        $media->save();

        return redirect()->route('admin.albums.show', $media->album_id)->with('success', 'Media updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        Storage::disk('public')->delete($media->file);
        $album_id = $media->album_id;
        $media->delete();
        return redirect()->route('admin.albums.show', $album_id)->with('success', 'Media deleted!');
    }
}
