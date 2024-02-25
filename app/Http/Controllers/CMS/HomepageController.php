<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageBanners;
use Illuminate\Support\Facades\Storage;
use App\Models\HomepageWhyDentmate;

class HomepageController extends Controller
{
    public function index()
    {
        $banners = HomepageBanners::all();
        $slot1 = HomepageWhyDentmate::whereSlotNumber(1);
        $slot2 = HomepageWhyDentmate::whereSlotNumber(2);
        $slot3 = HomepageWhyDentmate::whereSlotNumber(3);

        return inertia('CMS/Homepage', compact('banners', 'slot1', 'slot2', 'slot3'));
    }

    public function addBanner(Request $request)
    {
        if (! $request->file('image')->isValid()) {
            return "Invalid image";
        }

        $image = $request->file('image');
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "images/$uniqueFilename.$extension";

        $disk = Storage::disk('public');
        $url = $disk->put($path, file_get_contents($request->file('image')));

        HomepageBanners::create([
            'url' => $path
        ]);

        return back()
            ->with('notification.success', 'New image added');
    }

    public function removeBanner(Request $request)
    {
        $banner = HomepageBanners::findOrFail($request->image);
        $banner->delete();

        return back()
            ->with('notification.success', 'A banner has been deleted');
    }

    public function saveWhyDentmate(Request $request)
    {
        if (! $request->file('image')->isValid()) {
            return "Invalid image";
        }

        $image = $request->file('image');
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "images/$uniqueFilename.$extension";

        $disk = Storage::disk('public');
        $url = $disk->put($path, file_get_contents($request->file('image')));

        HomepageWhyDentmate::UpdateOrCreate([
            'slot_number' => $request->slotNumber
        ], [
            'slot_number' => $request->slotNumber,
            'photo_url' => $path,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()
            ->with('notification.success', 'Updated successfuly');
    }
}
