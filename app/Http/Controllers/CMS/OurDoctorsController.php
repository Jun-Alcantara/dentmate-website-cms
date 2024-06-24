<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use App\Models\OurDoctorsContent;
use App\Models\Branch;
use App\Models\Doctor;

class OurDoctorsController extends Controller
{
    public function index()
    {
        $banners = Banner::wherePage('our-doctors')
            ->get();

        $content = OurDoctorsContent::find(1);

        $doctors = Doctor::with('branch')->get();

        return inertia('CMS/OurDoctors', compact('banners', 'content', 'doctors'));
    }

    public function addBanner(Request $request)
    {
        $image = $request->file('image');
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "images/$uniqueFilename.$extension";

        Storage::put($path, file_get_contents($request->file('image')));

        Banner::create([
            'page' => 'our-doctors',
            'photo_url' => $path
        ]);

        return back()
            ->with('notification.success', 'New image added');
    }   

    public function deleteBanner(Request $request)
    {
        $banner = Banner::findOrFail($request->image);
        $banner->delete();

        return back()
            ->with('notification.success', 'A new banner has been added');
    }

    public function updateDocJustin(Request $request)
    {
        if ($request->has('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));
        }

        $data = [
            'primary_title' => $request->primary_title,
            'primary_writeup' => $request->primary_writeup,
        ];
        
        if (isset($path)) {
            $data['primary_photo_url'] = $path;
        }

        OurDoctorsContent::UpdateOrCreate([
            'id' => 1
        ], $data);

        return back()
            ->with('notification.success', 'Details updated');
    }

    public function addDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'branch' => 'required|exists:branches,id'
        ]);

        if ($request->has('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/doctor-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));
        }

        $slug = str_replace(" ", "-", $request->name) . "-" . uniqid();

        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'branch_id' => $request->branch,
            'content' => $request->content
        ];

        if (isset($path)) {
            $data['photo_url'] = $path;
        }

        Doctor::create($data);

        return back()
            ->with('notification.success', 'Doctor record has been saved');
    }

    public function deleteDoctor(Request $request)
    {
        $doctor = Doctor::findOrFail($request->id);
        $doctor->delete();

        return back()
            ->with('notification.success', 'Doctor record has been deleted');
    }

    public function updateDoctor(Request $request)
    {
        $doctor = Doctor::findOrFail($request->id);

        $request->validate([
            'name' => 'required',
            'branch' => 'required|exists:branches,id'
        ]);

        if ($request->has('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/doctor-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));
        }

        if (isset($path)) {
            $doctor->photo_url = $path;
        }

        
        $doctor->name = $request->name;
        $doctor->branch_id = $request->branch;
        $doctor->content = $request->content;
        $doctor->save();

        return back()
            ->with('notification.success', 'Doctor record has been updated');
    }

    public function edit(Doctor $doctor)
    {
        return inertia('CMS/OurDoctorsEdit', compact('doctor'));
    }
}
