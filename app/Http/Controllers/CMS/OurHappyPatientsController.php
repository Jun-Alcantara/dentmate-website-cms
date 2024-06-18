<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\PatientTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class OurHappyPatientsController extends Controller
{
    public function index()
    {
        $testimonials = PatientTestimonial::latest()->get();
        return inertia('CMS/OurHappyPatients', compact('testimonials'));
    }

    public function createTestimonial(Request $request)
    {
        $request->validate([
            'testimonial' => 'required'
        ]);

        $photoPath = null;
        if ($request->hasFile('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $photoPath = "images/$uniqueFilename.$extension";

            Storage::put($photoPath, file_get_contents($request->file('image')));
        }

        PatientTestimonial::create([
            'photo_url' => $photoPath,
            'testimonial' => $request->testimonial,
            'name' => $request->name,
            'created_by' => Auth::user()->id
        ]);

        return back()->with('notification.success', 'A new testimonial has been created');
    }

    public function updateTestimonial(Request $request)
    {
        $testimonial = PatientTestimonial::findOrFail($request->id);

        $request->validate([
            'testimonial' => 'required'
        ]);

        $photoPath = null;
        if ($request->hasFile('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $photoPath = "images/$uniqueFilename.$extension";

            Storage::put($photoPath, file_get_contents($request->file('image')));
        }

        if ($photoPath) {
            $testimonial->photo_url = $photoPath;
        }

        $testimonial->testimonial = $request->testimonial;
        $testimonial->name = $request->name;
        $testimonial->save();

        return back()->with('notification.success', 'A new testimonial has been updated');
    }

    public function deleteTestimonial(Request $request)
    {
        $testimonial = PatientTestimonial::findOrFail($request->id);
        $testimonial->delete();

        return back()->with('notification.success', 'A testimonial has been deleted');
    }

    public function bannerImages(PatientTestimonial $testimonial)
    {
        $banners = Banner::wherePage('ohp:' . $testimonial->id)->get();
        return inertia('CMS/OurHappyPatientImages', compact('testimonial', 'banners'));
    }
}
