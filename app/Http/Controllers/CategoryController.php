<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        if(session()->has('admin')) {
            $category = Category::orderBy('id','DESC')->get();
            return view('admin.category.category')
            ->with(compact(['category']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function addCategory(Request $request) {
        if(session()->has('admin')) {
           
            $title = $request->title;
            $content =$request->content;
            
            Category::create(
                [
                    
                    'category_name' => $title,
                    'category_desc' => $content
                ]
            );
            return redirect()->back()
            ->with('success','Category uploaded');
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateCategory(Request $request) {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            $title = $request->title;
            $content =$request->content;
            
            Category::where('id',$banner_id)->update(
                [
                    'category_name' => $title,
                    'category_desc' => $content
                ]
            );
           
            return redirect()->back()
            ->with('success','Category updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteCategory(Request $request)
    {
        if(session()->has('admin')) {
            $banner_id = $request->banner_id;
            Category::where('id',$banner_id)->delete();
            return redirect()->back()
            ->with('success','Category deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
