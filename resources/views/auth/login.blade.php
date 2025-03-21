<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achieved.id - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo-2.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#2A6B96",
                        secondary: "#5AA7D4",
                        accent: "#FFD166",
                        dark: "#1D3557",
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
    @if (session('logout_success'))
    <div id="alert" class="fixed top-4 right-4 md:right-10 z-50">
      <div class="bg-success text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between w-full md:w-auto" role="alert">
        <span class="mr-2">{{ session('logout_success') }}</span>
        <button type="button" class="close-alert text-white hover:text-gray-300 focus:outline-none">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
        <div class="text-center mb-8">
            <div class="text-3xl font-extrabold text-primary inline-block">
                <img src="{{ asset('logo-3.png') }}" alt="KiddiBooks Logo" class="h-12 w-auto">
            </div>
            <h2 class="text-2xl font-bold mt-4 text-dark">Admin Login</h2>
            <p class="text-gray-600 mt-2">Enter your credentials to access the dashboard</p>
        </div>
        <form action="{{ route('login') }}" class="space-y-6" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary
                    @error('email') border-error @enderror">
                @error('email')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary pr-10
                    @error('password') border-error @enderror">
                <span id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer mt-6">
                    <i class="fas fa-eye text-gray-500"></i>
                </span>
                @error('password')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-opacity-90 transition">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Need help? Contact <a href="mailto:achieved.id@gmail.com"
                    class="text-primary hover:underline">achieved.id@gmail.com</a></p>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
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

        // Close alert functionality
    const alert = document.getElementById('alert');
    if (alert) {
      setTimeout(function() {
        alert.remove();
      }, 500); // 5000 milliseconds = 5 seconds

      const closeAlertButton = alert.querySelector('.close-alert');
      closeAlertButton.addEventListener('click', function() {
        alert.remove();
      });
    }
    </script>
</body>

</html>
