<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function addBanner(Request $request)
    {
        $image = $request->file('image');
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "images/$uniqueFilename.$extension";

        Storage::put($path, file_get_contents($request->file('image')));

        Banner::create([
            'page' => $request->page,
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
}
