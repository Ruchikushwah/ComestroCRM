@extends('crm.layout')
@section('content')
<form action="{{ route('auth.verify-otp') }}" method="POST" class="mt-6">
    @csrf
    <div class="mb-4">
        <label for="otp" class="block text-sm font-medium text-gray-600">OTP</label>
        <input type="text" id="otp" name="otp" required class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
        @error('otp') <div class="text-red-500">{{ $message }}</div> @enderror
    </div>
    <input type="hidden" name="email" value="{{ old('email') }}">
    <button class="w-full px-4 py-2 text-white bg-indigo-500 rounded-lg">Verify OTP</button>
</form>
@endsection