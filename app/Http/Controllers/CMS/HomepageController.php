<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageBanners;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;

class HomepageController extends Controller
{
    public function index()
    {
        $banners = HomepageBanners::all();

        return inertia('CMS/Homepage', compact('banners'));
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
}
