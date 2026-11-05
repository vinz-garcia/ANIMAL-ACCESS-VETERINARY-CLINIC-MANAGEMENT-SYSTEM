<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Animal Access Veterinary Clinic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <!-- Card Container -->
    <div class="w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden text-center">
        
        <!-- 1. Clinic Header Banner Image -->
        <div class="w-full bg-red-100 flex justify-center items-center overflow-hidden">
            <img 
                src="{{ asset('images/header-banner.png') }}" 
                alt="Animal Access Veterinary Clinic Banner" 
                class="w-full h-auto object-cover"
            >
        </div>

        <!-- 2. Tagline & Location Subheading -->
        <div class="p-4 bg-gray-50 border-b border-gray-200">
            <p class="text-extra large font-medium text-black-700">
                Animal Access Veterinary Clinic
            </p> <p class="text-sm italic font-medium text-gray-700">
                "Caring for your pets with compassion and expertise."
            </p>
            <p class="text-xs text-gray-500 mt-1">
                Sapang Putol, San Ildefonso, Bulacan
            </p>
        </div>

        <!-- 3. Login Form Section -->
        <div class="p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-1">Welcome Back</h2>
            <p class="text-xs text-gray-500 mb-6">Sign in to access the clinic management system</p>

            <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm mx-auto text-left">
                @csrf
                
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}" 
                        required 
                        autofocus
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your username"
                    >
                    @error('username')
                        <span class="text-xs text-blue-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <span class="text-xs text-blue-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded transition duration-200 shadow"
                >
                    Sign In
                </button>
            </form>
        </div>

    </div>

</body>
</html>