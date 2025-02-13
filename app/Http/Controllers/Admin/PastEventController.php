<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PastEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PastEventController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
                'event_date' => 'required|date',
                'cover_image' => 'nullable|image|max:2048',
                'gallery.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
            ]);

            $pastEvent = new PastEvent();
            $pastEvent->fill($validated);

            if ($request->hasFile('cover_image')) {
                $coverImagePath = $request->file('cover_image')->store('past-events/covers', 'public');
                $pastEvent->cover_image = Storage::url($coverImagePath);
            }

            if ($request->hasFile('gallery')) {
                $galleryItems = [];
                foreach ($request->file('gallery') as $file) {
                    $path = $file->store('past-events/gallery', 'public');
                    $galleryItems[] = [
                        'id' => uniqid(),
                        'type' => $file->getMimeType() === 'video/mp4' ? 'video' : 'image',
                        'url' => Storage::url($path),
                        'caption' => $file->getClientOriginalName()
                    ];
                }
                $pastEvent->gallery = $galleryItems;
            }

            $pastEvent->save();

            return response()->json([
                'success' => true,
                'message' => 'Past event created successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating past event: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, PastEvent $pastEvent)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'cover_image' => 'nullable|image|max:2048',
            'gallery.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
        ]);

        $pastEvent->update($validated);

        if ($request->hasFile('cover_image')) {
            if ($pastEvent->cover_image) {
                Storage::delete(str_replace('/storage/', 'public/', $pastEvent->cover_image));
            }
            $coverImagePath = $request->file('cover_image')->store('past-events/covers', 'public');
            $pastEvent->cover_image = Storage::url($coverImagePath);
            $pastEvent->save();
        }

        if ($request->hasFile('gallery')) {
            $galleryItems = [];
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('past-events/gallery', 'public');
                $galleryItems[] = [
                    'id' => uniqid(),
                    'type' => $file->getMimeType() === 'video/mp4' ? 'video' : 'image',
                    'url' => Storage::url($path),
                    'caption' => $file->getClientOriginalName()
                ];
            }
            $pastEvent->gallery = array_merge($pastEvent->gallery ?? [], $galleryItems);
            $pastEvent->save();
        }

        return response()->json(['success' => true, 'message' => 'Past event updated successfully']);
    }

    public function destroy(PastEvent $pastEvent)
    {
        if ($pastEvent->cover_image) {
            Storage::delete(str_replace('/storage/', 'public/', $pastEvent->cover_image));
        }
        $pastEvent->delete();
        return response()->json(['success' => true, 'message' => 'Past event deleted successfully']);
    }

    public function show(PastEvent $pastEvent)
    {
        return response()->json([
            'id' => $pastEvent->id,
            'title' => $pastEvent->title,
            'location' => $pastEvent->location,
            'description' => $pastEvent->description,
            'event_date' => $pastEvent->event_date->format('Y-m-d'),
            'cover_image' => $pastEvent->cover_image,
            'gallery' => $pastEvent->gallery
        ]);
    }

    public function edit(PastEvent $pastEvent)
    {
        return response()->json([
            'id' => $pastEvent->id,
            'title' => $pastEvent->title,
            'location' => $pastEvent->location,
            'description' => $pastEvent->description,
            'event_date' => $pastEvent->event_date->format('Y-m-d'),
            'cover_image' => $pastEvent->cover_image,
            'gallery' => $pastEvent->gallery
        ]);
    }
}
