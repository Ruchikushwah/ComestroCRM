<?php

use App\Livewire\Contact\CreateContact;
use App\Livewire\CreateLead;
use App\Livewire\ManageContact;
use App\Livewire\ManageLeads;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 Route::prefix("crm")->group(function(){
    Route::get("/",function(){
        return view("crm.dashboard");
    });
    Route::get("/lead",function(){
        return view("crm.lead");
    })->name("crm.lead");

    Route::get("/contact",function(){
        return view("crm.contact");
    })->name("crm.contact");

    Route::get("/quotes",function(){
        return view("crm.quotes");
    })->name("crm.quotes");
    
    Route::get("/vendor",function(){
        return view("crm.vendor");
    })->name("crm.vendor");

    Route::get("/account",function(){
        return view("crm.account");
    })->name("crm.account");
    

Route::get('/create-lead', CreateLead::class)->name('create-lead');
Route::get('/create-lead/edit/{id}', CreateLead::class)->name('create-lead.edit');
Route::get('/manage-leads', ManageLeads::class)->name('manage-leads');

Route::get('/create-contact', CreateContact::class)->name('contact.create');
//Route::get('/create-lead/edit/{id}', CreateLead::class)->name('create-lead.edit');
//Route::get('/manage-contact', ManageContact::class)->name('manage-contact');



 });