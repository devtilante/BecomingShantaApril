<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Consultant;
use Hash;
use DB;
class AdminController extends Controller
{
    public function admin()
    {
        if(session()->has('admin')) {
            return redirect()->route('dashboard');
        }else {
            return view('admin.login');
        }
    }

    public function login(Request $request) {
        if(session()->has('admin')) {
            return redirect()->route('dashboard');
        }else {
            $email = $request->email;
            $password = $request->password;
        $consultantExists = Consultant::where('email',$email)->exists();  
        if($consultantExists){
            
            
            if($consultantExists) {
                $consultant = Consultant::where('email',$email)->first();
                if(Hash::check($password,$consultant->password)) {
                    session()->put('admin',$consultant->id);
                    session()->put('user_type','consultant');
                    return redirect()->route('dashboard');
                }else {
                    return redirect()->back()
                    ->with('error','Password not match');
                }
            }else {
                return redirect()->back()
                ->with('error','Email not registered');
            }
            
        }else{
            $adminExists = Admin::where('email',$email)->exists();
            if($adminExists) {
                $admin = Admin::where('email',$email)->first();
                if(Hash::check($password,$admin->password)) {
                    session()->put('admin',$admin->id);
                     session()->put('user_type','admin');
                    return redirect()->route('dashboard');
                }else {
                    return redirect()->back()
                    ->with('error','Password not match');
                }
            }else {
                return redirect()->back()
                ->with('error','Email not registered');
            }
        }
        }
    }

    public function dashboard()
    {
        if(session()->has('admin')) {
            $regUserCount=DB::table('registration')->count();
            $categoryCount=DB::table('category')->count();
            $subcategoryCount=DB::table('subcategory')->count();
            $bookingCount    =DB::table('appointment_invoice')->count();
            return view('admin.dashboard',compact('regUserCount','categoryCount','subcategoryCount','bookingCount'));
        }else {
            return redirect()->route('admin');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin');
    }
    
    public function booking_list(Request $request){
    
        
       
                       
                       
    
    $query = DB::table('appointment_invoice AS ai')
                      ->select('ai.*','r.C_Name as user_name','r.C_Email as user_email','r.C_Phone_Number','c.name as consultant_name','c.email as consultant_email','c.phone as consultant_phone')
                       
                       ->leftjoin('registration AS r','r.id','ai.user_id')
                       ->leftjoin('consultants AS c','c.id','ai.consultant_id')
                       ->orderBy('ai.id','DESC');
                       
    
    
    if (isset($request->start_date) && isset($request->end_date)) {
       
         
        $query->where('ai.invoice_date','>=',$request->start_date);
        $query->where('ai.invoice_date','<=',$request->end_date);
    }
    if(session()->get('user_type')=='consultant'){
        $query->where('ai.consultant_id',session()->get('admin'));
    }
    
    
   
    $booking_list=$query->get();
        
        return view('admin.booking.list-booking')->with(compact(['booking_list']));
    
   
 }
 
 public function edit_booking_list(Request $request){
     $id =$request->id;
     $data=DB::table('appointment_invoice')->where('id',$id)->first();
     $consultant_list =DB::table('consultants')->orderBy('id','DESC')->get();
     return view('admin.booking.edit')->with(compact(['data','consultant_list']));
 }
 
 public function update_booking_list(Request $request){
        $id=$request->id;
        
        $invoice_number =$request->invoice_number;
        $invoice_date   =$request->invoice_date;
        $order_amount   =$request->order_amount;
        $payment_status =$request->payment_status;
        $consultant_id  =$request->consultant_id;
        
        DB::table('appointment_invoice')->where('id',$id)->update([
             'invoice_number'=>$invoice_number,
             'invoice_date'=>$invoice_date,
             'order_amount'=>$order_amount,
             'payment_status'=>$payment_status,
             'consultant_id'=>$consultant_id
            ]);
            
             return redirect()->route('booking-list')
                ->with('success','Booking Updated Successfully');
     
 }
 
 public function update_booking_status(Request $request){
     $id=$request->id;
     DB::table('appointment_invoice')->where('id',$id)->update([
         'status'=>0
         ]);
   return redirect()->route('booking-list')
                ->with('success','Booking Updated Successfully');   
 }
}
