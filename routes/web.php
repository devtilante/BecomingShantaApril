<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SloatController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubcategoryController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\AssignsloatController;
use App\Http\Controllers\AssignSessionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('register',[HomeController::class,'register_view'])->name('register');
Route::post('store-register',[HomeController::class,'store_register'])->name('store-register');
Route::get('login',[HomeController::class,'login_view'])->name('login');
Route::get('logout-page',[HomeController::class,'logout_page'])->name('logout-page');
Route::post('login-process',[HomeController::class,'login_process'])->name('login-process');
Route::get('reset-password',[HomeController::class,'reset_password'])->name('reset-password');
Route::get('about-us',[HomeController::class,'about_us'])->name('about-us');
Route::get('contact-us',[HomeController::class,'contact_us'])->name('contact-us');
Route::get('privacy-policy',[HomeController::class,'privacy_policy'])->name('privacy-policy');
Route::get('payment-success',[HomeController::class,'payment_success'])->name('payment-success');
Route::get('payment-fail',[HomeController::class,'payment_fail'])->name('payment-fail');
Route::get('services',[HomeController::class,'services'])->name('services');
Route::get('consultants',[HomeController::class,'consultants'])->name('consultants');
Route::get('consultant-profile',[HomeController::class,'consultant_profile'])->name('consultant-profile');
Route::get('book-step1',[HomeController::class,'book_step_1'])->name('book-step1');
Route::any('book-step2',[HomeController::class,'book_step_2'])->name('book-step2');
Route::any('book-step3',[HomeController::class,'book_step_3'])->name('book-step3');
Route::any('book-step4',[HomeController::class,'book_step_4'])->name('book-step4');
Route::any('book-step5',[HomeController::class,'book_step_5'])->name('book-step5');
Route::post('category-wise-subcategory',[HomeController::class,'category_wise_subcategory'])->name('category-wise-subcategory');
Route::post('category-wise-subsubcategory',[HomeController::class,'category_wise_subsubcategory'])->name('category-wise-subsubcategory');
Route::post('save-invoice',[HomeController::class,'save_invoice'])->name('save-invoice');

Route::post('get-consultant',[HomeController::class,'get_consultant'])->name('get-consultant');
Route::post('get-session-details',[HomeController::class,'get_session_details'])->name('get-session-details');
Route::post('get-session-price',[HomeController::class,'get_session_price'])->name('get-session-price');


Route::get('terms-condition',[HomeController::class,'terms_condition'])->name('terms-condition');
Route::get('cancellation-policy',[HomeController::class,'cancellation_policy'])->name('cancellation-policy');
Route::post('add-to-cart',[HomeController::class,'addTocart'])->name('add-to-cart');
Route::post('get-type-wise-location',[HomeController::class,'type_wise_location'])->name('get-type-wise-location');
Route::any('forgot-password',[HomeController::class,'forgot_password'])->name('forgot-password');





Route::group(['middleware' => 'prevent-back-history'],function(){

    //Admin Routes
	Route::get('/admin-login',[AdminController::class,'admin'])->name('admin');
    Route::post('/login',[AdminController::class,'login'])->name('login');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    
    Route::any('booking-list',[AdminController::class,'booking_list'])->name('booking-list');
    Route::get('edit-booking-list',[AdminController::class,'edit_booking_list'])->name('edit-booking-list');
    Route::post('update-booking-list',[AdminController::class,'update_booking_list'])->name('update-booking-list');
    Route::get('update-booking-status',[AdminController::class,'update_booking_status'])->name('update-booking-status');

    Route::get('/enquiry-list',[EnquiryController::class,'enquiry_list'])->name('enquiry-list');
    Route::get('/contact-list',[EnquiryController::class,'contact_list'])->name('contact-list');
    Route::get('/appointment-list',[EnquiryController::class,'appointment_list'])->name('appointment-list');

    //Banner Routes
    Route::get('/banners',[BannerController::class,'banners'])->name('banners');
    Route::post('/add-banner',[BannerController::class,'addBanner'])->name('add-banner');
    Route::post('/update-banner',[BannerController::class,'updateBanner'])->name('update-banner');
    Route::post('/delete-banner',[BannerController::class,'deleteBanner'])->name('delete-banner');
    
    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add-category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update-category');
    Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete-category');
    
     Route::get('/location',[LocationController::class,'location'])->name('location');
    Route::post('/add-location',[LocationController::class,'addLocation'])->name('add-location');
    Route::post('/update-location',[LocationController::class,'updateLocation'])->name('update-location');
    Route::post('/delete-location',[LocationController::class,'deleteLocation'])->name('delete-location');
    
     Route::get('/session',[SessionController::class,'session'])->name('session');
    Route::post('/add-session',[SessionController::class,'addSession'])->name('add-session');
    Route::post('/update-session',[SessionController::class,'updateSession'])->name('update-session');
    Route::post('/delete-session',[SessionController::class,'deleteSession'])->name('delete-session');
    
    
    Route::get('/sloat',[SloatController::class,'sloat'])->name('sloat');
    Route::post('/add-sloat',[SloatController::class,'addSloat'])->name('add-sloat');
    Route::post('/update-sloat',[SloatController::class,'updateSloat'])->name('update-sloat');
    Route::post('/delete-sloat',[SloatController::class,'deleteSloat'])->name('delete-sloat');
    
    
    
    Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
    Route::post('/add-subcategory',[SubcategoryController::class,'addSubcategory'])->name('add-subcategory');
    Route::post('/update-subcategory',[SubcategoryController::class,'updateSubcategory'])->name('update-subcategory');
    Route::post('/delete-subcategory',[SubcategoryController::class,'deleteSubcategory'])->name('delete-subcategory');
    
    Route::get('/subsubcategory',[SubsubcategoryController::class,'subsubcategory'])->name('subsubcategory');
    Route::post('/add-subsubcategory',[SubsubcategoryController::class,'addSubsubcategory'])->name('add-subsubcategory');
    Route::post('/update-subsubcategory',[SubsubcategoryController::class,'updateSubsubcategory'])->name('update-subsubcategory');
    Route::post('/delete-subsubcategory',[SubsubcategoryController::class,'deleteSubsubcategory'])->name('delete-subsubcategory');
    
    
    
    Route::get('/assign-session',[AssignSessionController::class,'assign_session'])->name('assign-session');
    Route::post('/add-assign-session',[AssignSessionController::class,'addAssignsession'])->name('add-assign-session');
    Route::post('/update-assign-session',[AssignSessionController::class,'updateAssignsession'])->name('update-assign-session');
    Route::post('/delete-assign-session',[AssignSessionController::class,'deleteAssignsession'])->name('delete-assign-session');
    
    

    

    //Testimonial Routes
    Route::get('/testimonials',[TestimonialController::class,'testimonials'])->name('testimonials');
    Route::post('/add-testimonial',[TestimonialController::class,'addTestimonial'])->name('add-testimonial');
    Route::post('/update-testimonial',[TestimonialController::class,'updateTestimonial'])->name('update-testimonial');
    Route::post('/delete-testimonial',[TestimonialController::class,'deleteTestimonial'])->name('delete-testimonial');


    
	Route::namespace('App\Http\Controllers')->group(function () {
        

        Route::resource('cmspage', 'CmsController');
        Route::get('/create-cmspage', 'CmsController@create')->name('create-cmspage');
        Route::get('/edit-cmspage{id}', 'CmsController@edit')->name('edit-cmspage');
        Route::post('/update-cmspage', 'CmsController@update')->name('update-cmspage');
        Route::post('/store-cmspage', 'CmsController@store')->name('cmspage.store');
        
        
        Route::any('assignsloat','AssignsloatController@index')->name('assignsloat.index');
        Route::get('/create-assignsloat', 'AssignsloatController@create')->name('create-assignsloat');
        Route::get('/edit-assignsloat{id}', 'AssignsloatController@edit')->name('edit-assignsloat');
        Route::post('/update-assignsloat', 'AssignsloatController@update')->name('update-assignsloat');
        Route::post('/store-assignsloat', 'AssignsloatController@store')->name('assignsloat.store');
        Route::post('update-assign-sloat', 'AssignsloatController@update_assign_sloat')->name('update-assign-sloat');
        
        
        Route::any('disable-sloat','AssignsloatController@disable_sloat')->name('disable-sloat');
        Route::get('/create-disable-sloat', 'AssignsloatController@create_disable_sloat')->name('create-disable-sloat');
        Route::post('/store-disable-sloat', 'AssignsloatController@store_disable_sloat')->name('disableloat.store');
        Route::post('/update-disable-sloat', 'AssignsloatController@update_disable_sloat')->name('update-disable-sloat');
        
        
        
        Route::resource('consultant', 'ConsultantController');
        Route::get('/create-consultant', 'ConsultantController@create')->name('create-consultant');
        Route::get('/edit-consultant{id}', 'ConsultantController@edit')->name('edit-consultant');
        Route::post('/update-consultant', 'ConsultantController@update')->name('update-consultant');
        Route::post('/store-consultant', 'ConsultantController@store')->name('consultant.store');
        
        
    });

    
});
