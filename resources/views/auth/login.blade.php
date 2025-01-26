@extends('crm.layout')
@section('content')

<div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>
    <form action="{{ route('auth.sendOtp') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <button class="w-full px-4 py-2 text-white bg-indigo-500 rounded-lg">Send OTP</button>
    </form>
</div>
@endsection