<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function location()
    {
        if(session()->has('admin')) {
            $location = Location::orderBy('id','DESC')->get();
            return view('admin.location.location')
            ->with(compact(['location']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addLocation(Request $request) {
        if(session()->has('admin')) {
           
            $type = $request->type;
            $location_name = $request->location_name;
            $location_code = $request->location_code;
            
            Location::create(
                [
                    
                    'type' => $type,
                    'location_name' => $location_name,
                    'location_code' => $location_code
                ]
            );
            return redirect()->back()
            ->with('success','Location uploaded');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateLocation(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $type = $request->type;
            $location_name = $request->location_name;
            $location_code = $request->location_code;
            
            Location::where('id',$banner_id)->update(
                [
                    'type' => $type,
                    'location_name' => $location_name,
                    'location_code' => $location_code
                ]
            );
           
            return redirect()->back()
            ->with('success','Location updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteLocation(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            Location::where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Location deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
