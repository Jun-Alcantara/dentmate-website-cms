<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\AboutUsContent;
use App\Models\Banner;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $content = AboutUsContent::first();
        $founders = Personel::whereListGroup('founders')->get();
        $managements = Personel::whereListGroup('management')->get();

        return inertia('CMS/AboutUs', compact('content', 'founders', 'managements'));
    }

    public function updateOurStory(Request $request)
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $this->uploadPhoto($request->file('image'), 'founders');
        }

        AboutUsContent::UpdateOrCreate([
            'id' => 1
        ], [
            'our_story_photo_url' => $path,
            'our_story_writeup' => $request->writeup
        ]);
        
        return back()
            ->with('notification.success', 'Our story content has been updated');
    }

    public function updateFounders(Request $request)
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $this->uploadPhoto($request->file('image'), 'founders');
        }

        AboutUsContent::UpdateOrCreate([
            'id' => 1
        ], [
            'founders_photo_url' => $path,
            'founders_writeup' => $request->writeup
        ]);
        
        return back()
            ->with('notification.success', 'Founders story content has been updated');
    }

    public function createPersonel(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'listGroup' => 'required'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $this->uploadPhoto($request->file('image'), 'founders');
        }
        
        if ($request->has('id') && ! is_null($request->id)) {
            $item = Personel::findOrFail($request->id);

            if ($path) {
                $item->photo_url = $path;
            }

            $item->name = $request->name;
            $item->bio = $request->bio;
            $item->position = $request->position;
            $item->list_group = $request->listGroup;
            $item->save();
        } else {
            Personel::UpdateOrCreate(['id' => $request->id], [
                'photo_url' => $path,
                'name' => $request->name,
                'bio' => $request->bio,
                'position' => $request->position,
                'list_group' => $request->listGroup
            ]);
        }

        return back()
            ->with('notification.success', 'Details saved');
    }

    public function deletePersonel(Request $request)
    {
        $item = Personel::findOrFail($request->id);
        $item->delete();

        return back()
            ->with('notification.success', 'A record has been deleted');
    }

    private function uploadPhoto($image, $dir = 'images')
    {
        $extension = $image->extension();
        $uniqueFilename = now()->timestamp;
        $path = "$dir/$uniqueFilename.$extension";

        Storage::put($path, file_get_contents($image));

        return $path;
    }
}
