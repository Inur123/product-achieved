<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achieved.id - Admin Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo-2.png') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#2A6B96", // Deep blue/teal
                        secondary: "#5AA7D4", // Lighter blue
                        accent: "#FFD166",
                        dark: "#1D3557", // Navy
                        light: "#F7F7F7",
                        success: "#4CAF50",
                        pending: "#FFC107",
                        error: "#F44336",
                    },
                    fontFamily: {
                        sans: ["Nunito", "sans-serif"],
                    },
                },
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
        <div class="text-center mb-8">
            <div class="text-3xl font-extrabold text-primary inline-block">
                <img src="{{ asset('logo-3.png') }}" alt="KiddiBooks Logo" class="h-12 w-auto">
            </div>
            <h2 class="text-2xl font-bold mt-4 text-dark">Admin Register</h2>
            <p class="text-gray-600 mt-2">Enter your credentials to access the dashboard</p>
        </div>

        <form action="{{ route('register') }}" class="space-y-6" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary
                    @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary
                    @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary
                    pr-10 @error('password') border-red-500 @enderror">
                <span id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer mt-6">
                    <i class="fas fa-eye text-gray-500"></i>
                </span>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-opacity-90 transition">
                Sign Up
            </button>
        </form>


        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Need help? Contact <a href="mailto:support@kiddibooks.com"
                    class="text-primary hover:underline">support@kiddibooks.com</a></p>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>


</html>
