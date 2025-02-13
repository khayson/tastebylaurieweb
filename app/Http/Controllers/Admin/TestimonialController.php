<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_avatar' => 'nullable|image|max:1024',
                'message' => 'required|string',
                'event_type' => 'nullable|string|max:100',
                'event_date' => 'nullable|date',
                'is_featured' => 'boolean'
            ]);

            if ($request->hasFile('client_avatar')) {
                $path = $request->file('client_avatar')->store('testimonials/avatars', 'public');
                $validated['client_avatar'] = Storage::url($path);
            }

            Testimonial::create($validated);

            return redirect()->route('admin.testimonials.index')
                ->with('success', 'Testimonial created successfully.');
        } catch (ValidationException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $e->errors(),
                ], 422);
            }
            throw $e;
        }
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_avatar' => 'nullable|image|max:1024',
                'message' => 'required|string',
                'event_type' => 'nullable|string|max:100',
                'event_date' => 'nullable|date',
                'is_featured' => 'boolean'
            ]);

            if ($request->hasFile('client_avatar')) {
                if ($testimonial->client_avatar) {
                    Storage::delete(str_replace('/storage/', 'public/', $testimonial->client_avatar));
                }
                $path = $request->file('client_avatar')->store('testimonials/avatars', 'public');
                $validated['client_avatar'] = Storage::url($path);
            }

            $testimonial->update($validated);

            return redirect()->route('admin.testimonials.index')
                ->with('success', 'Testimonial updated successfully.');
        } catch (ValidationException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $e->errors(),
                ], 422);
            }
            throw $e;
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_avatar) {
            Storage::delete(str_replace('/storage/', 'public/', $testimonial->client_avatar));
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
