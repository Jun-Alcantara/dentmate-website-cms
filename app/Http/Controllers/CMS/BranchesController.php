<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Branch;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return inertia('CMS/Branches', compact('branches'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address'=> 'required',
            'email' => 'required|email',
            'contact_number' => 'required|max:15',
            'facebook' => 'required'
        ]);

        if ($request->has('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/branches-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));
        }

        if ($request->has('bannerImage') && ! is_null($request->bannerImage)) {
            $image = $request->file('bannerImage');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $bannerPath = "images/branches-banner-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('bannerImage')));
        }

        $data = $request->only(['name','address','email','contact_number','facebook',]);
        if (isset($path)) {
            $data['photo_url'] = $path;
        }

        if (isset($bannerPath)) {
            $data['banner_image'] = $bannerPath;
        }

        Branch::create($data);

        return back()
            ->with('notification.success', 'New branch added');
    }

    public function delete(Request $request)
    {
        $branch = Branch::findOrFail($request->id);
        $branch->delete();

        return back()
            ->with('notification.success', 'A branch has been deleted');
    }

    public function update(Request $request)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'address'=> 'required',
            'email' => 'required|email',
            'contact_number' => 'required|max:15',
            'facebook' => 'required'
        ]);

        $branch = Branch::findOrFail($request->id);
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->email = $request->email;
        $branch->contact_number = $request->contact_number;
        $branch->facebook = $request->facebook;

        if ($request->hasFile('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/branches-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));

            $branch->photo_url = $path;
        }

        if ($request->hasFile('bannerImage') && ! is_null($request->bannerImage)) {
            $image = $request->file('bannerImage');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $bannerImage = "images/branches-banner-$uniqueFilename.$extension";

            Storage::put($bannerImage, file_get_contents($request->file('bannerImage')));

            $branch->banner_image = $bannerImage;
        }

        $branch->save();

        return back()
            ->with('notification.success', 'A branch has been deleted');
    }
}
