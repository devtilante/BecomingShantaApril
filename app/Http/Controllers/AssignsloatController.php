<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cmspage;
use DB;

class AssignsloatController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if(session()->get('user_type')=='admin'){
        $consultant_list =DB::table('consultants')->orderBy('id','DESC')->get();
        }else{
            $consultant_list =DB::table('consultants')->where('id',session()->get('admin'))->orderBy('id','DESC')->get();
        }
        $sloat_master    =DB::table('sloat_master')->orderBy('id','ASC')->get();
        $assign_sloat=[];
        $is_onlineArr=[];
        
        $consultant_id ="";
        $day="";
        if($request->has('consultant_id') && $request->has('day')){
            $consultant_id =$request->consultant_id;
            $day           =$request->day;
            $assignsloat=DB::table('assign_sloat')->where('consultant_id',$consultant_id)->where('day',$day)->pluck('sloat_id');
            
            foreach($assignsloat as $sloatID){
                array_push($assign_sloat,$sloatID);
                
                
            }
            
            
            foreach($sloat_master as $sloat){
                
                $onlineExists=DB::table('assign_sloat')->where('consultant_id',$consultant_id)->where('sloat_id',$sloat->id)->where('day',$day)->exists();
                $is_online=0;
                if($onlineExists){
                    $onlineData=DB::table('assign_sloat')->where('consultant_id',$consultant_id)->where('sloat_id',$sloat->id)->where('day',$day)->first();
                    $is_online=$onlineData->is_online;
                }
                array_push($is_onlineArr,$is_online);
            }
            
            
            
        }
        //echo "<pre>"; print_r($assign_sloat); exit;
        

        return view('admin.assign-sloat.sloat' , compact('consultant_list','sloat_master','assign_sloat','consultant_id','day','is_onlineArr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(session()->get('user_type')=='admin'){
        $consultant_list =DB::table('consultants')->orderBy('id','DESC')->get();
         }else{
        $consultant_list =DB::table('consultants')->where('id',session()->get('admin'))->orderBy('id','DESC')->get();
         }
        $sloat_master    =DB::table('sloat_master')->orderBy('id','ASC')->get();
        return view('admin.assign-sloat.create',compact('consultant_list','sloat_master'));
    }
    
    public function create_disable_sloat(){
        if(session()->get('user_type')=='admin'){
        $consultant_list =DB::table('consultants')->orderBy('id','DESC')->get();
         }else{
        $consultant_list =DB::table('consultants')->where('id',session()->get('admin'))->orderBy('id','DESC')->get();
         }
        $sloat_master    =DB::table('sloat_master')->orderBy('id','ASC')->get();
        return view('admin.assign-sloat.disable-sloat',compact('consultant_list','sloat_master'));
    }
    
    public function store_disable_sloat(Request $request){
         if(session()->has('admin')) {
            $rules = [
                
                    'consultant_id' => 'required',
                    'date' => 'required'

            ];
            $request->validate($rules);
           
            $consultant_id = $request->consultant_id;
            $date = $request->date;
            $sloatIDArr = $request->sloat_id;
            
            foreach($sloatIDArr as $sloat_id){
                if(!empty($sloat_id)){
                    
                   DB::table('disable_sloat')->insert([
                       'consultant_id'=>$consultant_id,
                       'date'=>$date,
                       'sloat_id'=>$sloat_id
                       ]); 
                }
            }

            
            return redirect()->route('create-disable-sloat')
            ->with('success','Successfuly added');
        }else {
            return redirect()->route('admin');
        }
        
    }
    
    public function disable_sloat(Request $request){
        if(session()->get('user_type')=='admin'){
        $consultant_list =DB::table('consultants')->orderBy('id','DESC')->get();
         }else{
        $consultant_list =DB::table('consultants')->where('id',session()->get('admin'))->orderBy('id','DESC')->get();
         }
        $sloat_master    =DB::table('sloat_master')->orderBy('id','ASC')->get();
        $disable_sloat=[];
        $is_onlineArr=[];
        
        $consultant_id ="";
        $date="";
        if($request->has('consultant_id') && $request->has('date')){
            $consultant_id  =$request->consultant_id;
            $date           =$request->date;
            $disablesloat=DB::table('disable_sloat')->where('consultant_id',$consultant_id)->where('date',$date)->pluck('sloat_id');
            
            foreach($disablesloat as $sloatID){
                array_push($disable_sloat,$sloatID);
                
                
            }
        
        }
        //echo "<pre>"; print_r($assign_sloat); exit;
        

        return view('admin.assign-sloat.disable-sloat-list' , compact('consultant_list','sloat_master','disable_sloat','consultant_id','date'));
    }
    
    public function update_disable_sloat(Request $request){
        
         $hid_consultant_id =$request->hid_consultant_id;
        $hid_date           =$request->hid_date;
        
        DB::table('disable_sloat')->where('consultant_id',$hid_consultant_id)->where('date',$hid_date)->delete();
        
        $sloatIDArr = $request->sloat_id;
            
            foreach($sloatIDArr as $sloat_id){
                if(!empty($sloat_id)){
                    
                   DB::table('disable_sloat')->insert([
                       'consultant_id'=>$hid_consultant_id,
                       'date'=>$hid_date,
                       'sloat_id'=>$sloat_id
                       ]); 
                }
            }
            
            return redirect()->route('disable-sloat')
            ->with('success','Successfuly Updated');
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
                
                    'consultant_id' => 'required',
                    'day' => 'required'

            ];
            $request->validate($rules);
           
            $consultant_id = $request->consultant_id;
            $day = $request->day;
            $sloatIDArr = $request->sloat_id;
            
            foreach($sloatIDArr as $sloat_id){
                if(!empty($sloat_id)){
                    $is_online =$_POST['is_online_'.$sloat_id];
                   DB::table('assign_sloat')->insert([
                       'consultant_id'=>$consultant_id,
                       'day'=>$day,
                       'sloat_id'=>$sloat_id,
                       'is_online'=>$is_online
                       ]); 
                }
            }

            
            return redirect()->route('create-assignsloat')
            ->with('success','Successfuly added');
        }else {
            return redirect()->route('admin');
        }
    }
    
    public function update_assign_sloat(Request $request){
        
        $hid_consultant_id =$request->hid_consultant_id;
        $hid_day           =$request->hid_day;
        
        DB::table('assign_sloat')->where('consultant_id',$hid_consultant_id)->where('day',$hid_day)->delete();
        
        $sloatIDArr = $request->sloat_id;
            
            foreach($sloatIDArr as $sloat_id){
                if(!empty($sloat_id)){
                    $is_online =$_POST['is_online_'.$sloat_id];
                   DB::table('assign_sloat')->insert([
                       'consultant_id'=>$hid_consultant_id,
                       'day'=>$hid_day,
                       'sloat_id'=>$sloat_id,
                       'is_online'=>$is_online
                       ]); 
                }
            }
            
            return redirect()->route('assignsloat.index')
            ->with('success','Successfuly Updated');
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
    public function edit(Cmspage $Cmspage,$id)
    {
        //

        $datas = Cmspage::where('id',$id)->get();

        return view('admin.cmspage.edit' , compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //


        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);


            $testimonial_id = $request->id;
            $title = $request->title;
            $content = $request->content;
           $upadtedone = Cmspage::where('id',$testimonial_id)->update(
                [
                    'title' => $request->title,

                    'content' => $content,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,

                ]
            );
            if($request->has('image') && $request->image != '' && $request->image != null) {
                $imageFile = $request->file('image');
                $imageFileName = time().$imageFile->getClientOriginalName();
                $image = $imageFile->move('images/cmspage',$imageFileName);
                Cmspage::where('id',$testimonial_id)->update(
                    [
                        'image' => $image
                    ]
                );
            }




        return redirect()->route('cmspage.index')->with('success','Successfuly Update');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cmspage $Cmspage)
    {
        //

        if(session()->has('admin')) {
            $testimonial_id = $request->id;
            Cmspage::where('id',$testimonial_id)->delete();
            return redirect()->back()
            ->with('success','Success deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}
