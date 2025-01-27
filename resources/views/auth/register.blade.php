@extends('crm.layout')
@section('content')

<div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700">sign up</h2>
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input type="name" id="name" name="name" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label for="contact" class="block text-sm font-medium text-gray-600">Contact</label>
            <input type="contact" id="contact" name="contact" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('contact') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <!-- <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">password</label>
            <input type="password" id="password" name="password" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
        </div> -->
        <button class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">sign up</button>
    </form>
</div>
@endsection