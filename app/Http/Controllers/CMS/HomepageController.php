<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageBanners;
use App\Models\HomepageBeforeAndAfter;
use Illuminate\Support\Facades\Storage;
use App\Models\HomepageWhyDentmate;

class HomepageController extends Controller
{
    public function index()
    {
        $banners = HomepageBanners::all();
        $slot1 = HomepageWhyDentmate::whereSlotNumber(1)->first();
        $slot2 = HomepageWhyDentmate::whereSlotNumber(2)->first();
        $slot3 = HomepageWhyDentmate::whereSlotNumber(3)->first();
        $beforeAndAfter = HomepageBeforeAndAfter::all();

        return inertia('CMS/Homepage', compact('banners', 'slot1', 'slot2', 'slot3', 'beforeAndAfter'));
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

        Storage::put($path, file_get_contents($request->file('image')));

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
        $request->validate([
            'title' => 'required'
        ]);

        if ($request->has('image') && ! is_null($request->image)) {
            if (! $request->file('image')->isValid()) {
                return "Image cannot be more than 2MB";
            }
    
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/$uniqueFilename.$extension";
    
            Storage::put($path, file_get_contents($request->file('image')));    
        }

        $updated = [
            'slot_number' => $request->slotNumber,
            'title' => $request->title,
            'description' => $request->description
        ];

        if (isset($path)) {
            $updated['photo_url'] = $path;
        }

        HomepageWhyDentmate::UpdateOrCreate([
            'slot_number' => $request->slotNumber
        ], $updated);

        return back()
            ->with('notification.success', 'Updated successfuly');
    }

    public function addBeforeAndAfter(Request $request)
    {
        if (! $request->file('image')->isValid()) {
            return "Invalid image";
        }

        $image = $request->file('image');
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "images/$uniqueFilename.$extension";

        $disk = Storage::put($path, file_get_contents($request->file('image')));

        HomepageBeforeAndAfter::create([
            'url' => $path
        ]);

        return back()
            ->with('notification.success', 'New image added');
    }

    public function deleteBeforeAndAfter(Request $request)
    {
        $banner = HomepageBeforeAndAfter::findOrFail($request->image);
        $banner->delete();

        return back()
            ->with('notification.success', 'A banner has been deleted');
    }
}
