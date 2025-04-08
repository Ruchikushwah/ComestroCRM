@extends('layout')

@section('content')
<div class="flex flex-col items-center px-4 mt-20">
    <h2 class="text-3xl font-bold text-[#0071bc] text-center">Send Us a Message</h2>
    <p class="text-lg text-gray-700 text-center mt-2 max-w-2xl">
        Have a question or need assistance? Send us a message, and we’ll get back to you soon!
    </p>
    <!-- Contact Form -->
    <div class="rounded-lg p-6 mt-4 w-full max-w-2xl">
        @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('send.message') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium">Your Name</label>
                <input type="text" name="name" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" placeholder="Your Name" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Your Email</label>
                <input type="email" name="email" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" placeholder="abc@example.com" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Message</label>
                <textarea name="message" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" rows="4" placeholder="How can we help you?" required></textarea>
            </div>
            <button type="submit" class="w-full bg-[#0071bc] text-white py-3 rounded-lg shadow-md hover:bg-[#005a9c] transition">
                Send Message
            </button>
        </form>
    </div>
</div>
@endsection