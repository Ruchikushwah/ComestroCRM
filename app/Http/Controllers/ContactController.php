<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Http;
use App\Events\MessageSent; // Ensure this is imported
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
        ]);

        // Prepare data for email and event
        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ];

        // Send email
        Mail::to(config('mail.from.address'))->send(new ContactFormMail($data));

        // Broadcast event
        event(new MessageSent($data));
    
        // Return success response
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
