<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium E-Commerce Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        /* Custom Swiper Pagination Styles to match Tailwind aesthetics */
        .swiper-pagination-bullet {
            background-color: #ffffff;
            opacity: 0.4;
            width: 10px;
            height: 10px;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            width: 24px;
            border-radius: 6px;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col lg:flex-row antialiased text-gray-800">

    <div class="relative w-full h-[35vh] lg:h-screen lg:w-[60%] flex-shrink-0 z-0">

        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative">
                    <img src="https://assets.vogue.com/photos/68dae911f58409e8a3cae7e7/master/w_2560%2Cc_limit/blendedcollage%2520%283%29.jpg"
                        alt="Fashion Shopping" class="w-full h-full object-cover object-center" />
                </div>
                <div class="swiper-slide relative">
                    <img src="https://hips.hearstapps.com/hmg-prod/images/gettyimages-1461552909-65775e9c51e7a.jpg?crop=0.6666666666666666xw%3A1xh%3Bcenter%2Ctop&resize=1200%3A%2A"
                        alt="Boutique Store" class="w-full h-full object-cover object-center" />
                </div>
                <div class="swiper-slide relative">
                    <img src="https://cdn.prod.website-files.com/67f65be7b5af2cf29f51f5a3/67f8d815c04eef1d50302f3e_0FbdRhEBYluS9EQKmptgW_3015fcfe81b8489e84993d03a68ed162.jpeg"
                        alt="Shopping Bags" class="w-full h-full object-cover object-center" />
                </div>
            </div>

            <div
                class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-black/80 lg:from-black/70 via-black/30 lg:via-black/40 to-transparent z-10 pointer-events-none">
            </div>

            <div class="absolute bottom-12 lg:bottom-24 left-6 lg:left-16 z-20 flex flex-col gap-4">
                <h2 class="text-3xl lg:text-5xl font-bold text-white tracking-tight drop-shadow-lg">
                    Shop Smart,<br />Live Better
                </h2>
                <p class="text-gray-200 text-sm lg:text-base max-w-sm hidden lg:block">
                    Discover the latest trends and exclusive collections tailored just for you.
                </p>
            </div>

            <div class="swiper-pagination !bottom-6 lg:!bottom-12 !left-6 lg:!left-16 !w-auto !text-left z-20"></div>
        </div>
    </div>

    <div class="flex-1 flex items-center justify-center p-4 sm:p-8 lg:p-12 z-10 lg:w-[40%]">

        <div
            class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-2xl lg:shadow-none lg:bg-transparent -mt-16 lg:mt-0 relative backdrop-blur-md">

            @if (Session::has('success'))
                <p class="text-sm text-green-500">{{ Session::get('success') }}</p>
            @endif

            <div class="mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-sm text-gray-500">Login to your account to continue shopping.</p>
            </div>
 
            
            @if (Session::has('error'))
                <p class="text-sm text-red-500 bg-red-100 p-3 border border-red-400 ">{{ Session::get('error') }}</p>
            @endif

            <form action="{{ route('admin.authentication') }}" method="POST" class="space-y-5">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" value="{{ old('email') }}" id="email" name="email" autocomplete="email"
                        placeholder="name@example.com" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 @error('email') is-invalid  @enderror focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none text-gray-900 placeholder-gray-400" />
                    @error('email')
                        <p class="invalid-feedback text-red-700">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#"
                            class="text-sm font-medium text-purple-600 hover:text-purple-500 hover:underline transition-all">Forgot
                            Password?</a>
                    </div>
                    <input type="password" id="password" name="password" autocomplete="current-password" required
                        placeholder="••••••••"
                        class="w-full @error('password') is-invalid  @enderror px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none text-gray-900 placeholder-gray-400" />
                    @error('password')
                        <p class="invalid-feedback text-red-700">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center pt-2">
                    <input id="remember-me" name="remember-me" type="checkbox" required
                        class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded cursor-pointer accent-purple-600 transition-all">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-600 cursor-pointer">
                        Remember me
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-600 to-blue-500 text-white font-semibold py-3 px-4 rounded-lg hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 mt-4">
                    Login
                </button>

            </form>

            <div class="mt-8 text-center text-sm text-gray-600">
                <p>
                    Don't have an account?
                    <a href="{{ route('admin.signup') }}"
                        class="font-semibold text-purple-600 hover:text-purple-500 hover:underline transition-all">Create
                        New Account</a>
                </p>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper(".mySwiper", {
                effect: "fade", // Premium crossfade effect between images
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                loop: true,
                speed: 1000, // Smooth 1-second transition
            });
        });
    </script>
</body>

</html>
