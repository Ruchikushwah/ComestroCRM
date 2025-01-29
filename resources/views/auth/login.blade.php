<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>

<div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
    <div class="bg-white shadow-lg rounded-lg flex w-full max-w-4xl">
        <!-- Left Side - Sign In -->
        <div class="w-1/2 p-8">
            <img src="/comestro.png" alt="Logo" class="h-10 mb-4">
            <h2 class="text-2xl font-semibold">Sign in</h2>
            <p class="text-gray-600 text-sm mb-6">to access CRM</p>

            <form wire:submit.prevent="submit" class="space-y-4">
                <input type="email" wire:model="email" placeholder="Email address or mobile number"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Next
                </button>
            </form>

            <div class="mt-6">
                <p class="text-gray-600 text-sm mb-2">Sign in using</p>
                <div class="flex space-x-3">
                    <button class="p-2 bg-gray-200 rounded"><img src="/google icon.png" class="h-6"></button>
                    
                </div>
            </div>

            <p class="text-sm text-gray-600 mt-6">Don't have a Comestro account? 
                <a href="{{route('auth.register')}}" class="text-blue-500 font-semibold">Sign up now</a>
            </p>
        </div>

        <!-- Right Side - MFA Info -->
        <div class="w-1/2 bg-gray-50 p-8 flex flex-col justify-center text-center">
            <img src="/signin.png" alt="MFA" class="mx-auto w-48">
            <h3 class="text-lg font-semibold mt-4">Empowering businesses with secure authentication.</h3>
            <p class="text-gray-600 text-sm mt-2">
            Enhance your security with OneAuth 2FA. Your accounts, your control.
            </p>
            <button class="mt-4 bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
                Learn more
            </button>
        </div>
    </div>
</div>


    <div id="otp-modal" class="hidden fixed inset-0  items-center justify-center bg-gray-900 bg-opacity-50">
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
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                        Verify OTP
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const otpModal = document.getElementById('otp-modal');
            const closeModalButton = document.getElementById('close-modal');
            const otpEmailField = document.getElementById('otp_email');
            const otpHiddenField = document.getElementById('otp_email_hidden');
            const sendOtpForm = document.getElementById('send-otp-form');

            // Show OTP modal if session has otp_sent
            @if(session('otp_sent'))
            otpModal.classList.remove('hidden');
            otpHiddenField.value = "{{ session('email') }}";
            @endif

            // Hide OTP modal when "Cancel" button is clicked
            closeModalButton.addEventListener('click', function() {
                otpModal.classList.add('hidden');
            });

            // Ensure email is passed to the hidden field before form submission
            sendOtpForm.addEventListener('submit', function() {
                const email = otpEmailField.value;
                otpHiddenField.value = email;
            });
        });
    </script>

</body>

</html