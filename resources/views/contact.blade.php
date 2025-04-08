@extends('layout')
@section('content')
<div class="rounded-lg p-6  w-full max-w-2xl">
    <form action="{{ route('send.message') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium">Your Name</label>
            <input type="text" name="name" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" placeholder="Hello" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium">Your Email</label>
            <input type="email" name="email" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" placeholder="abc@example.com" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium">Message</label>
            <textarea name="message" class="w-full p-3 border rounded-lg focus:outline-none hover:bg-slate-100" rows="4" placeholder="How can we help you?" required></textarea>
        </div>


        <button type="submit" class="w-full bg-[#0071bc] text-white py-3 rounded-lg shadow-md hover:bg-[#005fa3] transition">
            Send Message
        </button>
    </form>
</div>
@endsection