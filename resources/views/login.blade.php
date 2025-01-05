<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex justify-center items-center">
    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Sign in to your account</h2>
        
        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf <!-- CSRF Token -->
            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                       class="form-control @error('username') is-invalid @enderror w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" value="{{ old('username') }}">
                       @error('username')
                         <div class="invalid-feedback">
                          {{ $message }}
                         </div>
                       @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-300">
                    Login
                </button>
            </div>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account? <a href="/" class="text-indigo-600 hover:underline">Contact Admin</a>
        </p>
    </div>
</body>
</html>
