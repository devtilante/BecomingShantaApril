<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;
use Hash;
class ConsultantController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = Consultant::get();
        return view('admin.consultant.consultantpage' , compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.consultant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     //echo "<pre>"; print_r($request->all()); exit;
        if(session()->has('admin')) {
            $rules = [
                'name' => 'required|max:255',
                    'image' => 'required',
                    'content' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'designation' => 'required'

            ];
            $request->validate($rules);
            $tourmenuid     =$request->tour_menu_id;
            $categoryArr    =$request->category;
            $comasep_category =implode(",",$categoryArr);
            $subcategoryArr =$request->subcategory;
            $comasep_subcategory =implode(",",$subcategoryArr);
            $comasep_subsubcategory ="";
            if($request->has('subsubcategory')){
            $subsubcategoryArr =$request->subsubcategory;
            $comasep_subsubcategory =implode(",",$subsubcategoryArr);
            }
            
            $imageFile = $request->file('image');
            $imageFileName = time().$imageFile->getClientOriginalName();
            $image = $imageFile->move('images/consultant',$imageFileName);
            $title = $request->title;
            $content = $request->content;
            
            $experience         = $request->experience;
            $no_of_organization = $request->no_of_organization;
            $no_of_client       = $request->no_of_client;
            $password           =Hash::make($request->password);
            
            $type_of_service       = $request->type_of_service;
            $linkedin_username       = $request->linkedin_username;
            $instagram_username       = $request->instagram_username;
            $whatsapp_phone       = $request->whatsapp_phone;
            $specialization       = $request->specialization;
            $engaging_platforms       = $request->engaging_platforms;
            $education_qualification       = $request->education_qualification;
            $certification       = $request->certification;
            $past_organization       = $request->past_organization;
            $describe_ideal_client       = $request->describe_ideal_client;

                Consultant::Create(
                   [


                    'category_ids' => $comasep_category,
                    'subcategory_ids' => $comasep_subcategory,
                    'sub_sub_category_ids' => $comasep_subsubcategory,
                    'name' => $request->name,
                    'about_me' => $content,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'designation' => $request->designation,
                    'photo' => $imageFileName,
                    'experience'=>$experience,
                    'number_of_organization'=>$no_of_organization,
                    'number_of_client'=>$no_of_client,
                    'password'=>$password,
                    'type_of_service'=>$type_of_service,
                    'linkedin_username'=>$linkedin_username,
                    'instagram_username'=>$instagram_username,
                    'whatsapp_phone'=>$whatsapp_phone,
                    'specialization'=>$specialization,
                    'engaging_platforms'=>$engaging_platforms,
                    'education_qualification'=>$education_qualification,
                    'certification'=>$certification,
                    'past_organization'=>$past_organization,
                    'describe_ideal_client'=>$describe_ideal_client


                ]
            );
            return redirect()->route('consultant.index')
            ->with('success','Successfuly added');
        }else {
            return redirect()->route('admin');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cmspage $Cmspage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        //

        $datas = Consultant::where('id',$id)->get();

        return view('admin.consultant.edit' , compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //


        $validated = $request->validate([
                    'name' => 'required|max:255',
                    'content' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'designation' => 'required'
        ]);


            $testimonial_id = $request->id;
            $tourmenuid     =$request->tour_menu_id;
            $categoryArr    =$request->category;
            $comasep_category =implode(",",$categoryArr);
            $subcategoryArr =$request->subcategory;
            $comasep_subcategory =implode(",",$subcategoryArr);
            
             $comasep_subsubcategory ="";

            if($request->has('subsubcategory')){
            $subsubcategoryArr =$request->subsubcategory;
            $comasep_subsubcategory =implode(",",$subsubcategoryArr);
            }
            
            $content = $request->content;
            
             $experience         = $request->experience;
            $no_of_organization = $request->no_of_organization;
            $no_of_client       = $request->no_of_client;
            
            
             $type_of_service       = $request->type_of_service;
            $linkedin_username       = $request->linkedin_username;
            $instagram_username       = $request->instagram_username;
            $whatsapp_phone       = $request->whatsapp_phone;
            $specialization       = $request->specialization;
            $engaging_platforms       = $request->engaging_platforms;
            $education_qualification       = $request->education_qualification;
            $certification       = $request->certification;
            $past_organization       = $request->past_organization;
            $describe_ideal_client       = $request->describe_ideal_client;
            
            
            
           $upadtedone = Consultant::where('id',$testimonial_id)->update(
                [
                    'category_ids' => $comasep_category,
                    'subcategory_ids' => $comasep_subcategory,
                    'sub_sub_category_ids' => $comasep_subsubcategory,
                    'name' => $request->name,
                    'about_me' => $content,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'designation' => $request->designation,
                    'experience'=>$experience,
                    'number_of_organization'=>$no_of_organization,
                    'number_of_client'=>$no_of_client,
                     'type_of_service'=>$type_of_service,
                    'linkedin_username'=>$linkedin_username,
                    'instagram_username'=>$instagram_username,
                    'whatsapp_phone'=>$whatsapp_phone,
                    'specialization'=>$specialization,
                    'engaging_platforms'=>$engaging_platforms,
                    'education_qualification'=>$education_qualification,
                    'certification'=>$certification,
                    'past_organization'=>$past_organization,
                    'describe_ideal_client'=>$describe_ideal_client
                    

                ]
            );
            if($request->has('image') && $request->image != '' && $request->image != null) {
                $imageFile = $request->file('image');
                $imageFileName = time().$imageFile->getClientOriginalName();
                $image = $imageFile->move('images/cmspage',$imageFileName);
                Consultant::where('id',$testimonial_id)->update(
                    [
                        'photo' => $imageFileName
                    ]
                );
            }
            
            if($request->password != '' && $request->password != null) {
               $password           =Hash::make($request->password);
                Consultant::where('id',$testimonial_id)->update(
                    [
                        'password' => $password
                    ]
                );
            }




        return redirect()->route('consultant.index')->with('success','Successfuly Update');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        if(session()->has('admin')) {
            $testimonial_id = $request->id;
            Consultant::where('id',$testimonial_id)->delete();
            return redirect()->back()
            ->with('success','Success deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
