<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use DB;

class SubsubcategoryController extends Controller
{
    public function subsubcategory()
    {
        if(session()->has('admin')) {
            $subsubcategory   =DB::table('sub_sub_category AS ss')
                           ->select('ss.*','c.category_name','s.subcategory_name')
                           ->leftjoin('category AS c','c.id','ss.category_id')
                           ->leftjoin('subcategory AS s','s.id','ss.subcategory_id')
                           ->get();
            $category_list =DB::table('category')->orderBy('id','DESC')->get();  
            $subcategory_list =DB::table('subcategory')->orderBy('id','DESC')->get();  
            return view('admin.sub-sub-category.subsubcategory')
            ->with(compact(['subsubcategory','subcategory_list','category_list']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addSubsubcategory(Request $request) {
        if(session()->has('admin')) {
           
            
            $category_id = $request->category_id;
            $subcategory_id = $request->subcategory_id;
            $title = $request->title;
            
           DB::table('sub_sub_category')->insert([
               'category_id'=>$category_id,
               'subcategory_id'=>$subcategory_id,
               'sub_sub_category_name'=>$title
               ]);
            return redirect()->back()
            ->with('success','Sub Sub category Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateSubsubcategory(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $category_id = $request->category_id;
            $subcategory_id = $request->edit_subcategory_id;
            $title = $request->title;
            
           
            DB::table('sub_sub_category')->where('id',$banner_id)->update([
                'category_id'=>$category_id,
                'subcategory_id'=>$subcategory_id,
                'sub_sub_category_name'=>$title
                ]);
            
            return redirect()->back()
            ->with('success','Sub Sub category updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteSubsubcategory(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
           DB::table('sub_sub_category')->where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Sub Sub Category deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
