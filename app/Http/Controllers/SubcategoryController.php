<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use DB;

class SubcategoryController extends Controller
{
    public function subcategory()
    {
        if(session()->has('admin')) {
            $subcategory   =DB::table('subcategory AS s')
                           ->select('s.*','c.category_name')
                           ->leftjoin('category AS c','c.id','s.category_id')
                           ->get();
            $category_list =DB::table('category')->orderBy('id','DESC')->get();                   
            return view('admin.subcategory.subcategory')
            ->with(compact(['subcategory','category_list']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addSubcategory(Request $request) {
        if(session()->has('admin')) {
           
            
            $category_id = $request->category_id;
            $title = $request->title;
            
            $imageFile = $request->file('image');
            $imageFileName = time().$imageFile->getClientOriginalName();
            $image = $imageFile->move('images/subcategory',$imageFileName);
            
           DB::table('subcategory')->insert([
               'category_id'=>$category_id,
               'subcategory_name'=>$title,
               'photo' => $imageFileName
               ]);
            return redirect()->back()
            ->with('success','Subcategory Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateSubcategory(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $category_id = $request->category_id;
            $title = $request->title;
            
           
            DB::table('subcategory')->where('id',$banner_id)->update([
                'category_id'=>$category_id,
                'subcategory_name'=>$title
                ]);
                
                if($request->has('image') && $request->image != '' && $request->image != null) {
                $imageFile = $request->file('image');
                $imageFileName = time().$imageFile->getClientOriginalName();
                $image = $imageFile->move('images/subcategory',$imageFileName);
                DB::table('subcategory')->where('id',$banner_id)->update([
                'photo'=>$imageFileName
                ]);
            }
            
            return redirect()->back()
            ->with('success','Subcategory updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteSubcategory(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
           DB::table('subcategory')->where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','SubCategory deleted');
        }else {
            return redirect()->route('admin');
        }
    }
    
    
}
