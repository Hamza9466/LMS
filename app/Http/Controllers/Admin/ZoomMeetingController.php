<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ZoomMeetingController extends Controller
{
    public function index()
    {
        $meetings = ZoomMeeting::latest('starts_at')->paginate(12);
        return view('admin.pages.zoom_meetings.all_zoom', compact('meetings'));
    }

    public function create()
    {
        return view('admin.pages.zoom_meetings.add_zoom');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required','string','max:255'],
            'meeting_id'       => ['required','string','max:50','unique:zoom_meetings,meeting_id'],
            'starts_at'        => ['required','date'],
            'duration_minutes' => ['required','integer','min:1','max:1440'],
            'thumbnail'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'description'      => ['nullable','string'],
            'is_published'     => ['nullable'], // will normalize below
        ]);

        // Normalize checkbox
        $data['is_published'] = $request->boolean('is_published');

        // Handle image with native move()
        if ($request->hasFile('thumbnail')) {
            $file      = $request->file('thumbnail');
            $uploadDir = public_path('uploads/meetings');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $filename = 'meeting_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);

            // Save relative public path so Blade can use asset($path)
            $data['image_path'] = 'uploads/meetings/' . $filename;
        }

        ZoomMeeting::create($data);

        
        return redirect()->route('zoom-meetings.index')->with('success', 'Meeting created.');
    }

    public function show(ZoomMeeting $zoom_meeting)
    {
        return view('admin.pages.zoom_meetings.show_zoom', ['meeting' => $zoom_meeting]);
    }

    public function edit(ZoomMeeting $zoom_meeting)
    {
        return view('admin.pages.zoom_meetings.edit_zoom', ['meeting' => $zoom_meeting]);
    }

    public function update(Request $request, ZoomMeeting $zoom_meeting)
    {
        $data = $request->validate([
            'title'            => ['required','string','max:255'],
            'meeting_id'       => ['required','string','max:50', Rule::unique('zoom_meetings','meeting_id')->ignore($zoom_meeting->id)],
            'starts_at'        => ['required','date'],
            'duration_minutes' => ['required','integer','min:1','max:1440'],
            'thumbnail'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'description'      => ['nullable','string'],
            'is_published'     => ['nullable'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('thumbnail')) {
            // delete old image if present
            if (!empty($zoom_meeting->image_path)) {
                $old = public_path($zoom_meeting->image_path);
                if (File::exists($old)) File::delete($old);
            }

            $file      = $request->file('thumbnail');
            $uploadDir = public_path('uploads/meetings');
            if (!File::exists($uploadDir)) File::makeDirectory($uploadDir, 0755, true);

            $filename = 'meeting_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);

            $data['image_path'] = 'uploads/meetings/' . $filename;
        }

        $zoom_meeting->update($data);

        return redirect()->route('zoom-meetings.index')->with('success', 'Meeting updated.');
        // or ->route('zoom-meetings.index') if you didn’t prefix routes
    }

    public function destroy(ZoomMeeting $zoom_meeting)
    {
        if (!empty($zoom_meeting->image_path)) {
            $old = public_path($zoom_meeting->image_path);
            if (File::exists($old)) File::delete($old);
        }

        $zoom_meeting->delete();

        return redirect()->route('zoom-meetings.index')->with('success', 'Meeting deleted.');
        // or ->route('zoom-meetings.index') if no admin prefix
    }
}