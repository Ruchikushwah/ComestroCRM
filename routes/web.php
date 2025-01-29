<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Contact\CreateContact;
use App\Livewire\Contact\ManageContact;
use App\Livewire\CreateLead;
use App\Livewire\Quote\CreateQuote;
use App\Livewire\Quote\ManageQuote;


use App\Livewire\ManageLeads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix("crm")->group(function () {
    Route::get("/", function () {
        // Pass the authenticated user's name to the dashboard view
        return view("crm.dashboard", ['userName' => Auth::user()->name]);
    })->middleware('auth'); // Ensure the user is authenticated

    Route::get("/lead", function () {
        return view("crm.lead", ['userName' => Auth::user()->name]);
    })->name("crm.lead")->middleware('auth');

    Route::get("/contact", function () {
        return view("crm.contact", ['userName' => Auth::user()->name]);
    })->name("crm.contact")->middleware('auth');

    Route::get("/quotes", function () {
        return view("crm.quotes", ['userName' => Auth::user()->name]);
    })->name("crm.quotes")->middleware('auth');

    Route::get("/vendor", function () {
        return view("crm.vendor", ['userName' => Auth::user()->name]);
    })->name("crm.vendor")->middleware('auth');

    Route::get("/account", function () {
        return view("crm.account", ['userName' => Auth::user()->name]);
    })->name("crm.account")->middleware('auth');
});
    // Route::get("/", function () {
    //     return view("crm.dashboard");
    // });
    // Route::get("/lead", function () {
    //     return view("crm.lead");
    // })->name("crm.lead");

    // Route::get("/contact", function () {
    //     return view("crm.contact");
    // })->name("crm.contact");
    
    // Route::get("/quotes", function () {
    //     return view("crm.quotes");
    // })->name("crm.quotes");

    // Route::get("/vendor", function () {
    //     return view("crm.vendor");
    // })->name("crm.vendor");

    // Route::get("/account", function () {
    //     return view("crm.account");
    // })->name("crm.account");

Route::get('/create-quote',CreateQuote::class)->name('create-quote');
Route::get('/create-quote/edit/{id}',CreateQuote::class)->name('create-quote.edit');
Route::get('/manage-quote',ManageQuote::class)->name('quote.manage-quote');

    Route::get('/create-lead', CreateLead::class)->name('create-lead');
    Route::get('/create-lead/edit/{id}', CreateLead::class)->name('create-lead.edit');
    Route::get('/manage-leads', ManageLeads::class)->name('manage-leads');
    Route::get('/create-contact', CreateContact::class)->name('create-contact');
    Route::get('/create-contact/edit/{id}', CreateContact::class)->name('create-contact.edit');
    Route::get('/manage-contact', ManageContact::class)->name('contact.manage-contact');


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::get("/register", "showRegister")->name('auth.register');
    Route::post('/login', 'login')->name('auth.login.post');
    Route::post('/register', 'register')->name('auth.register.post');
    Route::get('/verify-otp',  'showOtpForm')->name('show.otp.form');


    // OTP verification handling route (POST request to verify OTP)
    Route::post('verify-otp',  'verifyOtp')->name('auth.verify-otp');
    Route::post('send-otp', 'sendOtp')->name('auth.sendOtp');
    Route::get('/logout',  'logout')->name('auth.logout');
});
