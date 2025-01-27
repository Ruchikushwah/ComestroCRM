@extends('crm.layout')
@section('content')

<div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>
    <form id="send-otp-form" action="{{ route('auth.sendOtp') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="otp_email" name="email" required 
                class="w-full px-4 py-2 mt-2 bg-gray-100 border rounded-lg focus:ring">
            @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">
            Send OTP
        </button>
    </form>
</div>

<div id="otp-modal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-lg font-semibold text-gray-800">Enter OTP</h3>
        <p class="text-sm text-gray-600 mb-4">An OTP has been sent to your email. Please enter it below:</p>

        <form action="{{ route('auth.verify-otp') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="email" id="otp_email_hidden" value="{{ session('email') }}">

            <div>
                <label for="otp" class="block text-gray-700 text-sm font-bold mb-2">OTP</label>
                <input type="text" name="otp" id="otp" required 
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:ring focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full"
                    placeholder="Enter OTP">
                @error('otp')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" id="close-modal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600">
                    Verify OTP
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const otpModal = document.getElementById('otp-modal');
        const closeModalButton = document.getElementById('close-modal');
        const otpEmailField = document.getElementById('otp_email');
        const otpHiddenField = document.getElementById('otp_email_hidden');
        const sendOtpForm = document.getElementById('send-otp-form');

        // Show OTP modal if session has otp_sent
        @if (session('otp_sent'))
            otpModal.classList.remove('hidden');
            otpHiddenField.value = "{{ session('email') }}";
        @endif

        // Hide OTP modal when "Cancel" button is clicked
        closeModalButton.addEventListener('click', function () {
            otpModal.classList.add('hidden');
        });

        // Ensure email is passed to the hidden field before form submission
        sendOtpForm.addEventListener('submit', function () {
            const email = otpEmailField.value;
            otpHiddenField.value = email;
        });
    });
</script>

@endsection
