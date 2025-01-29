<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles if needed */
        .gradient-bg {
            background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
        }
    </style>
</head>

<body class=" min-h-screen flex items-center justify-center p-4">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden max-w-4xl w-full">
        <!-- Image Section -->
        <div class="md:w-1/2">
            <img src="/4380747.jpg" alt="Sign Up" class="w-full h-full object-cover">
        </div>

        <!-- Form Section -->
        <div class="md:w-1/2 p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Sign Up</h2>
            <form action="{{ route('auth.register') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact Field -->
                <div>
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                    <input type="text" id="contact" name="contact" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    @error('contact')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sign Up Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                    Sign Up
                </button>
            </form>
        </div>
    </div>
</body>

</html>