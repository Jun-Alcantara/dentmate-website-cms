<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\HomepageBanners;
use App\Models\HomepageBeforeAndAfter;
use App\Models\HomepageWhyDentmate;
use App\Models\PatientTestimonial;
use App\Models\Services;
use App\Models\OurDoctorsContent;
use App\Models\AboutUsContent;
use App\Models\Personel;

class SiteController extends Controller
{
    public function homepage()
    {
        $banners = HomepageBanners::get('url');
        $whyDentmate = HomepageWhyDentmate::whereIn('slot_number', [1,2,3])
            ->get()
            ->mapWithKeys(function ($slot) {
                return [$slot->slot_number => $slot];
            })
            ->toArray();
        $beforeAndAfter = HomepageBeforeAndAfter::get('url');
        $services = Services::whereServiceListType('normal')->get();
        $branches = Branch::all();

        return view('site.homepage', compact('banners', 'whyDentmate', 'beforeAndAfter', 'services', 'branches'));
    }

    public function ourDoctors()
    {
        $content = OurDoctorsContent::first();
        $banners = Banner::wherePage('our-doctors')->get();
        $doctors = Doctor::orderBy('branch_id')->with('branch')->get();

        return view('site.our-doctors', compact('content', 'banners', 'doctors'));
    }

    public function services()
    {
        $services = Services::whereServiceListType('normal')->get();
        $otherServices = Services::whereServiceListType('others')->get();
        $branches = Branch::all();
        
        return view('site.services', compact('services', 'otherServices', 'branches'));
    }

    public function ourHappyPatients()
    {
        $testimonials = PatientTestimonial::get()->map(function ($testimonial) {
            $testimonial->images = Banner::wherePage('ohp:' . $testimonial->id)->get();
            return $testimonial;
        });

        return view('site.our-happy-patients', compact('testimonials'));
    }

    public function aboutUs()
    {
        $content = AboutUsContent::first();
        $founders = Personel::whereListGroup('founders')->get();
        $managers = Personel::whereListGroup('management')->get();

        return view('site.about-us', compact('content', 'founders', 'managers'));
    }

    public function showService(Services $service)
    {
        return view('site.service-inner', compact('service'));
    }

    public function showBranch(Branch $branch)
    {
        return view('site.branch-inner', compact('branch'));
    }

    public function ourDoctorInner(Doctor $doctor)
    {
        $branch = $doctor->Branch;
        $doctors = Doctor::where('id', '!=', $doctor->id)
            ->get();

        return view('site.our-doctors-inner', compact('doctor', 'branch', 'doctors'));
    }
}
