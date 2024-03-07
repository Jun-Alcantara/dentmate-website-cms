<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::whereServiceListType('normal')->get();
        $otherServices = Services::whereServiceListType('others')->get();
        $banners = Banner::wherePage('services')->get();

        return inertia('CMS/Services', compact('services', 'banners', 'otherServices'));
    }

    public function addService(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        if ($request->has('image') && ! is_null($request->image)) {
            $image = $request->file('image');
            $extension = $image->extension();
            $uniqueFilename = now()->timestamp;
            $path = "images/services-$uniqueFilename.$extension";

            Storage::put($path, file_get_contents($request->file('image')));
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->id
        ];

        if (isset($path) && ! is_null($path)) {
            $data['photo_url'] = $path;
        }

        Services::create($data);

        return back()
            ->with('notification.success', 'A new service has been added');
    }

    public function updateService(Request $request)
    {
        $service = Services::findOrFail($request->id);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();

        return back()->with('notification.success', 'Service details updated');
    }

    public function deleteService(Request $request)
    {
        $service = Services::findOrFail($request->id);
        $service->delete();

        return back()
            ->with('notification.success', 'A service has been deleted');
    }

    public function updateOtherServices(Request $request)
    {
        $otherServices = explode(PHP_EOL, $request->services);

        Services::whereServiceListType('others')->delete();

        foreach ($otherServices as $service) {
            Services::create([
                'name' => $service, 
                'service_list_type' => 'others',
                'created_by' => Auth::user()->id
            ]);
        }
    }
}
