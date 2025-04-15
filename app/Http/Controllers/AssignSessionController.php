<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use DB;

class AssignSessionController extends Controller
{
    public function assign_session()
    {
        if(session()->has('admin')) {
            $assign_session   =DB::table('assign_session AS as')
                           ->select('as.*','c.category_name','s.subcategory_name','sm.session_name','ssc.sub_sub_category_name')
                           ->leftjoin('category AS c','c.id','as.category_id')
                           ->leftjoin('subcategory AS s','s.id','as.subcategory_id')
                           ->leftjoin('sub_sub_category AS ssc','ssc.id','as.sub_sub_categroy_id')
                           ->leftjoin('session_master AS sm','sm.id','as.session_id')
                           ->orderBy('as.id','DESC');
                           $assign_session   =$assign_session->paginate(10);
                           
            $category_list =DB::table('category')->orderBy('id','DESC')->get();   
            $subcategory_list =DB::table('subcategory')->orderBy('id','DESC')->get(); 
            $sub_sub_category_list =DB::table('sub_sub_category')->orderBy('id','DESC')->get(); 
            $session_master     =DB::table('session_master')->orderBy('id')->get();
            return view('admin.assign-session.assign_session')
            ->with(compact(['category_list','subcategory_list','sub_sub_category_list','session_master','assign_session']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addAssignsession(Request $request) {
        if(session()->has('admin')) {
           
            
            $category_id         = $request->category_id;
            $subcategory_id      = $request->subcategory_id;
            $sub_sub_category_id = $request->sub_sub_category_id;
            $session_id          = $request->session_id;
            $session_price       = $request->session_price;
            $validity       = $request->validity;
            $free_session       = $request->free_session;
            $allowed_reschedules       = $request->allowed_reschedules;
            //$comaSep_session_id =implode(",", $session_idArr);
            
          
           DB::table('assign_session')->insert([
               'category_id'=>$category_id,
               'subcategory_id'=>$subcategory_id,
               'sub_sub_categroy_id'=>$sub_sub_category_id,
               'session_id'=>$session_id,
               'session_price'=>$session_price,
               'validity'=>$validity,
               'free_session'=>$free_session,
               'allowed_reschedules'=>$allowed_reschedules
               ]);
           
            return redirect()->back()
            ->with('success','Session Assign Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateAssignsession(Request $request) {
        if(session()->has('admin')) {
            $banner_id      = $request->banner_id;
            $category_id    = $request->edit_category_id;
            $subcategory_id = $request->edit_subcategory_id;
            $sub_sub_category_id = $request->edit_sub_sub_category_id;
            $session_id = $request->session_id;
            $session_price  = $request->session_price;
            $validity       = $request->validity;
            $free_session       = $request->free_session;
            $allowed_reschedules       = $request->allowed_reschedules;
            
           
            DB::table('assign_session')->where('id',$banner_id)->update([
                'category_id'=>$category_id,
                'subcategory_id'=>$subcategory_id,
                 'sub_sub_categroy_id'=>$sub_sub_category_id,
                'session_id'=>$session_id,
                'session_price'=>$session_price,
                'validity'=>$validity,
               'free_session'=>$free_session,
               'allowed_reschedules'=>$allowed_reschedules
                ]);
            
            return redirect()->back()
            ->with('success','Assign Session updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteAssignsession(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
           DB::table('assign_session')->where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Assign Session deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
