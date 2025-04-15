<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function session()
    {
        if(session()->has('admin')) {
            $session = Session::orderBy('id','DESC')->get();
            return view('admin.session.session')
            ->with(compact(['session']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addSession(Request $request) {
        if(session()->has('admin')) {
           
            $title = $request->title;
            
            Session::create(
                [
                    
                    'session_name' => $title
                ]
            );
            return redirect()->back()
            ->with('success','Session uploaded');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateSession(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $title = $request->title;
            
            Session::where('id',$banner_id)->update(
                [
                    'session_name' => $title
                ]
            );
           
            return redirect()->back()
            ->with('success','Session updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteSession(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            Session::where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Session deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
