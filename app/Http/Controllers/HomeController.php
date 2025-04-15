<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerConfirmationMail;
use App\Mail\AdminConfirmationMail;
use App\Mail\SendForgotpasswordMail;
use App\Mail\SendEnquiryMail;


class HomeController extends Controller{


    //

    public function home(){
       
        return view('index');
    }

    public function register_view(){
        return view('register');
    }

    public function login_view(){
        return view('login');
    }
    public function about_us(){
        return view('about');
    }
    public function services(){
        return view('service');
    }

    public function consultants(){
        if(!session()->has('user_id')){
            return redirect('/login'); 
        }
        $cunsultant_list=DB::table('consultants')->orderBy('id','DESC')->get();
        return view('consultants',compact('cunsultant_list'));
    }
    public function consultant_profile(Request $request){
        $consultant_id =$request->id;
        $single_consultant=DB::table('consultants')->where('id',$consultant_id)->first();
        return view('consultant-profile',compact('single_consultant'));
    }
    public function book_step_1(){
        if(!session()->has('user_id')){
            return redirect('/login'); 
        }
        return view('booking-step1');
    }
    public function book_step_2(){
        $category_list=DB::table('category')->orderBy('id','DESC')->get();
        return view('booking-step2',compact('category_list'));
    }

    public function book_step_3(){
        $location_list=DB::table('location_master')->orderBy('id','DESC')->get();
        return view('booking-step3',compact('location_list'));
    }
    public function book_step_4(Request $request){
        
        if($request->date){
                $date=$request->date;
                session()->put('session_booking_date',$date);
            }else{
                $date=date('Y-m-d');
                session()->put('session_booking_date',$date);
            }
            $appointment_type ="";
            if($request->appointment_type){
               $appointment_type = $request->appointment_type;
            }
            
        if(!$request->last_added_slot && $request->last_added_slot==""){
                return redirect()->route('book-step3', ['date' => $date, 'appointment_type' => $appointment_type])->with('error','Please Choose a Slot');
        }
        return view('booking-step4');
    }
    public function book_step_5(){
        return view('booking-step5');
    }

    public function terms_condition(){
        return view('terms-condition');
    }
    public function cancellation_policy(){
        return view('cancellation-policy');
    }
    
     public function contact_us(){
        return view('contact-us');
    }
     public function privacy_policy(){
        return view('privacy-policy');
    }
    
    public function payment_success(){
        return view('payment-success');
    }
    
    public function payment_fail(){
        return view('payment-fail');
    }
    
    public function category_wise_subcategory(Request $request){
        $category_id =$request->category_id;
        $subcategory_list=DB::table('subcategory')->where('category_id',$category_id)->get();
        return response()->json($subcategory_list);
    }
    public function category_wise_subsubcategory(Request $request){
        
        $category_id      =$request->category_id;
        $sub_category_id  =$request->sub_category_id;
        $subcategory_list =DB::table('sub_sub_category')->where('category_id',$category_id)->where('subcategory_id',$sub_category_id)->get();
        return response()->json($subcategory_list);
    }
    public function type_wise_location(Request $request){
       $type=$request->type;
       $location_list =DB::table('location_master')->where('type',$type)->get();
        return response()->json($location_list);
    }
    public function get_consultant(Request $request){
        
        $category_id    =$request->category_id;
        $subcategory_id =$request->subcategory_id;
        
       // $sub_sub_category_id =$request->sub_sub_category_id;
        
        
        
        if($request->has('sub_sub_category_id')  && $request->sub_sub_category_id!=""){
            $sub_sub_category_id =$request->sub_sub_category_id;
        $consultant_list =DB::table('consultants')->whereIn('category_ids',[$category_id])->whereRaw("FIND_IN_SET(?, subcategory_ids)", [$subcategory_id])->whereRaw("FIND_IN_SET(?, sub_sub_category_ids)", [$sub_sub_category_id])->get(); 
        }else{
           
           $consultant_list =DB::table('consultants')->whereIn('category_ids',[$category_id])->whereIn('subcategory_ids',[$subcategory_id])->get(); 
        }
        //$consultantlist =$consultant_list->get();
        return response()->json($consultant_list);
        
    }
    
    public function get_session_details(Request $request){
        
        $category_id         =$request->category_id;
        $subcategory_id      =$request->subcategory_id;
        $sub_sub_category_id =$request->sub_sub_category_id;
        
         if($request->has('sub_sub_category_id') && $request->sub_sub_category_id!=""){
        $session_list =DB::table('assign_session AS as')
                          ->select('as.*','sm.session_name')
                          ->leftjoin('session_master AS sm','sm.id','as.session_id')
                          ->orderBy('as.session_id','asc');
                          if($request->has('category_id')){
                           $session_list->where('as.category_id',$category_id); 
                         }
                          if($request->has('subcategory_id')){
                           $session_list->where('as.sub_sub_categroy_id',$sub_sub_category_id); 
                         }
                         
                         if($request->has('sub_sub_category_id')){
                           $session_list->where('as.sub_sub_categroy_id',$sub_sub_category_id); 
                         }
                         
                         $session_list=$session_list->get();
         }else{
             $session_list=[];
         }
        return response()->json($session_list);
    }
    
    public function get_session_price(Request $request){
        $category_id         =$request->category_id;
        $subcategory_id      =$request->subcategory_id;
        $sub_sub_category_id =$request->sub_sub_category_id;
        $session_id          =$request->session_id;
        
         if($request->has('sub_sub_category_id') && $request->sub_sub_category_id!=""){
        $session_list =DB::table('assign_session AS as')
                          ->select('as.*','sm.session_name')
                          ->leftjoin('session_master AS sm','sm.id','as.session_id')
                          ->orderBy('as.session_id','asc');
                          if($request->has('category_id')){
                           $session_list->where('as.category_id',$category_id); 
                         }
                          if($request->has('subcategory_id')){
                           $session_list->where('as.sub_sub_categroy_id',$sub_sub_category_id); 
                         }
                         
                         if($request->has('sub_sub_category_id')){
                           $session_list->where('as.sub_sub_categroy_id',$sub_sub_category_id); 
                         }
                          if($request->has('session_id')){
                           $session_list->where('as.session_id',$session_id); 
                         }
                         
                         $session_list=$session_list->get();
         }else{
             $session_list=[];
         }
        return response()->json($session_list);
    }

    public function store_register(Request $request){
       
        $fullname     =$request->fullname;
        $emailinput   =$request->emailinput;
        $phonenumber  =$request->phonenumber;
        $dob          =date('Y-m-d',strtotime($request->dob));
        $pass_word    =$request->pass_word;
        $communication_method    =$request->communication_method;
        $registering_behalf    =$request->registering_behalf;

        $EmailExists=DB::table('registration')->where('C_Email',$emailinput)->exists();
        if($EmailExists){
            return response()->json([
                'status'=>'error',
                'msg'=>'Email Already Exists'
            ]);
        }

        $PhoneExists=DB::table('registration')->where('C_Phone_Number',$phonenumber)->exists();
        if($PhoneExists){
            return response()->json([
                'status'=>'error',
                'msg'=>'Phone Already Exists'
            ]);
        }

        $InsertDB=DB::table('registration')->insert([
            'C_Name'=>$fullname,
            'C_Email'=>$emailinput,
            'C_Phone_Number'=>$phonenumber,
            'C_DOB'=>$dob,
            'C_Password'=>Hash::make($pass_word),
            'C_Communication_Method'=>$communication_method,
            'C_Registering_Behalf'=>$registering_behalf
        ]);
        
        if($InsertDB){
            
             $toemail=env('MAIL_TO_ADDRESS');
            $mail_data=array('full_name'=>$fullname,'email'=>$emailinput,'phone_no'=>$phonenumber,'dob'=>$dob,'communication_method'=>$communication_method,'registering_behalf'=>$registering_behalf,'pass_word'=>$pass_word);
            
				Mail::to($emailinput)->send(new SendEnquiryMail($mail_data));
				
            return response()->json([
                'status'=>'success',
                'msg'=>'Register Successfully'
            ]);
        }
    }

    public function login_process(Request $request){
        $email     =$request->emailinput;
        $password  =$request->pass_word;

        $adminExists = DB::table('registration')->where('C_Email',$email)->exists();
        if($adminExists) {
            $admin =  DB::table('registration')->where('C_Email',$email)->first();
            if(Hash::check($password,$admin->C_Password)) {
                session()->put('user_id',$admin->ID);
                session()->put('name',$admin->C_Name);
                session()->put('user_email',$admin->C_Email);
                session()->put('user_phone',$admin->C_Phone_Number);
                return response()->json([
                    'status'=>'success',
                    'msg'=>'Login Successfully'
                ]);
            }else {
                return response()->json([
                    'status'=>'error',
                    'msg'=>'Enter valid Username/Password'
                ]);
            }
        }else {
            return response()->json([
                'status'=>'error',
                'msg'=>'Email Not Registered'
            ]);
        }
    }

    public function reset_password(){
        return view('reset-password');
    }
    
    public function logout_page(Request $request){
        
        $request->session()->flush();
        return redirect('/login'); 
        
    }
    
    public function addTocart(Request $request){
        $user_id        =session()->get('user_id');
        $consultant_id  =$request->consultant_id;
        $sloat_id       =$request->sloat_id;
        $booking_date   =$request->booking_date;
        
        $slotDet=DB::table('sloat_master')->where('id',$sloat_id)->first();
        $slot =$slotDet->sloat_name;
        $slotArr=explode("to",$slot);
        
        
        
        $slotIsDisable =DB::table('disable_sloat')->where('sloat_id',$sloat_id)->where('consultant_id',$consultant_id)->where('date',$booking_date)->exists();
        if($slotIsDisable){
            return response()->json([
                'status'=>'error',
                'message'=>$booking_date." Date is Disabled"
                ]);
        }
        
        
        
        date_default_timezone_set('Asia/Kolkata'); // Set your timezone

$slotStart = strtotime($slotArr[0]); // Convert slot start time to timestamp
$slotEnd = strtotime($slotArr[1]);   // Convert slot end time to timestamp
$currentTime = time();             // Get the current timestamp

if ($currentTime < $slotStart) {
    
    $bookingExists =DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->where('sloat_id',$sloat_id)->where('date',$booking_date)->exists();
        if($bookingExists==false){
            DB::table('appointment_book_cart')->insert([
                'user_id'=>$user_id,
                'consultant_id'=>$consultant_id,
                'sloat_id'=>$sloat_id,
                'date'=>$booking_date
                ]);
        }else{
            DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->where('sloat_id',$sloat_id)->where('date',$booking_date)->delete();
            $cart_list =DB::table('appointment_book_cart AS abc')
                    ->select('abc.*','c.name','sm.sloat_name')
                    ->leftjoin('consultants AS c','c.id','abc.consultant_id')
                    ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                    ->where('abc.user_id',$user_id)
                    ->where('abc.consultant_id',$consultant_id)
                    ->get();
                    
                    return response()->json(['status'=>'error',
                        'cart_list'=>$cart_list,
                        'message'=>'Slot is Deleted'
                        ]);
        }
        
    /* $cart_list =DB::table('appointment_book_cart AS abc')
                    ->select('abc.*','c.name','sm.sloat_name')
                    ->leftjoin('consultants AS c','c.id','abc.consultant_id')
                    ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                    ->where('abc.user_id',$user_id)
                    ->where('abc.consultant_id',$consultant_id)
                    ->get();
                    
                    return response()->json(['status'=>'success',
                        'cart_list'=>$cart_list]); */
} elseif ($currentTime >= $slotStart && $currentTime <= $slotEnd) {
    
    $bookingExists =DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->where('sloat_id',$sloat_id)->where('date',$booking_date)->exists();
        if($bookingExists==false){
            DB::table('appointment_book_cart')->insert([
                'user_id'=>$user_id,
                'consultant_id'=>$consultant_id,
                'sloat_id'=>$sloat_id,
                'date'=>$booking_date
                ]);
                
                 $cart_list =DB::table('appointment_book_cart AS abc')
                    ->select('abc.*','c.name','sm.sloat_name')
                    ->leftjoin('consultants AS c','c.id','abc.consultant_id')
                    ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                    ->where('abc.user_id',$user_id)
                    ->where('abc.consultant_id',$consultant_id)
                    ->get();
                    
                    return response()->json(['status'=>'success',
                        'cart_list'=>$cart_list]);
        }
        else{
            DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->where('sloat_id',$sloat_id)->where('date',$booking_date)->delete();
             $cart_list =DB::table('appointment_book_cart AS abc')
                    ->select('abc.*','c.name','sm.sloat_name')
                    ->leftjoin('consultants AS c','c.id','abc.consultant_id')
                    ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                    ->where('abc.user_id',$user_id)
                    ->where('abc.consultant_id',$consultant_id)
                    ->get();
                    
                    return response()->json(['status'=>'error',
                        'cart_list'=>$cart_list,
                        'message'=>'Slot is Deleted'
                        ]);
        }
   
} else {
    return response()->json(['status'=>'error',
                        'message'=>'Slot Time Is Over']);
}

        
        
    }
    
    public function save_invoice(Request $request){
        $invoice_no     ="INV-".rand();
        $invoice_date   =date('Y-m-d');
        $order_amount   =$request->total_order_amount;
        $payment_status =1;
        $appointment_type =$request->appointment_type;
        
        
        if($appointment_type==1){
            $metting_link="https://meet.google.com/abc-mnop-xyz";
        }
        else{
            $metting_link=session()->get('session_location');
        }
        $consultant_id =$request->consultant_id;
        $user_id       =$request->user_id;
        
        $invoice_Id = DB::table('appointment_invoice')->insertGetId([
                        'invoice_number' => $invoice_no,
                        'invoice_date' => $invoice_date,
                        'order_amount' => $order_amount,
                        'payment_status'=>$payment_status,
                        'user_id'=>$user_id,
                        'location'=>$metting_link,
                        'consultant_id'=>$consultant_id]);
       $CartDetails    =DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->get();
       if($CartDetails){
           
           foreach($CartDetails as $cart){
               
             DB::table('appointment_invoice_details')->insert([
                      'invoice_id'=>$invoice_Id,         
                      'date'=>$cart->date,
                      'slot_id'=>$cart->sloat_id]);   
                      
                      
           }
           
           }
           $bookingDet=DB::table('appointment_book_cart AS abc')
                       ->select('abc.*','sm.sloat_name')
                       ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                       ->where('abc.user_id',$user_id)
                       ->where('abc.consultant_id',$consultant_id)
                       ->get();
           $userDet       =DB::table('registration')->where('ID',$user_id)->first();
           $consultantDet =DB::table('consultants')->where('id',$consultant_id)->first();
           
           $mail_data=array('name'=>$userDet->C_Name,'email'=>$userDet->C_Email ,'phone'=>$userDet->C_Phone_Number,'dob'=>$userDet->C_DOB,'consultant_name'=>$consultantDet->name,'consultant_email'=>$consultantDet->email,'consultant_phone'=>$consultantDet->phone,'location'=>$metting_link,'bookingDet'=>$bookingDet);
           $customer_email=$userDet->C_Email;
           $admin_email   ="admin@becomingshanta.com";
				Mail::to($customer_email)->send(new CustomerConfirmationMail($mail_data));
				Mail::to($admin_email)->send(new AdminConfirmationMail($mail_data));
           
           
           $emptyCart=DB::table('appointment_book_cart')->where('user_id',$user_id)->where('consultant_id',$consultant_id)->delete(); 
           
       session()->flush();
       return redirect()->route('home')->with('success', 'Appointment Booked Successfully.');
    /*   return response()->json([
           'status'=>'success',
           'message'=>'Appointment Booked Successfully'
           ]); */
                        
    }
    
    function forgot_password(Request $request){
        
        $email=$request->email;
       
    if($email!=''){
        $chk_email=DB::table('registration')->where('C_Email',$email)->exists();
        if($chk_email){
            $users=DB::table('registration')->where('C_Email',$email)->first();
            

            $length = 8;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $otp = '';
            
            for ($i = 0; $i < $length; $i++) {
                $otp .= $characters[random_int(0, $charactersLength - 1)];
            }
           
            $updatePassword=DB::table('registration')->where('C_Email',$email)->update([
                'C_Password'=>Hash::make($otp)
            ]);
            

            $mail_data=array('C_Email'=>$email,'C_Password'=>$otp);
            
				Mail::to($email)->send(new SendForgotpasswordMail($mail_data));

            return redirect()->route('reset-password')->with('success', 'Email Send To Your Register Email Address.');
            

        }else{
            return redirect()->route('reset-password')->with('error', 'Email Does Does not Exists.');
        }
    }
    }
}
