<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sloat;

class SloatController extends Controller
{
    public function sloat()
    {
        if(session()->has('admin')) {
            $sloat = Sloat::orderBy('id','DESC')->get();
            return view('admin.sloat.sloat')
            ->with(compact(['sloat']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addSloat(Request $request) {
        if(session()->has('admin')) {
           
            $title = $request->title;
            
            Sloat::create(
                [
                    
                    'sloat_name' => $title
                ]
            );
            return redirect()->back()
            ->with('success','Sloat Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateSloat(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $title = $request->title;
            
            Sloat::where('id',$banner_id)->update(
                [
                    'sloat_name' => $title
                ]
            );
           
            return redirect()->back()
            ->with('success','Sloat updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteSloat(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            Sloat::where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Sloat deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
