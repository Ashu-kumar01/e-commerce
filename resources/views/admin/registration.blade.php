<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium SaaS Registration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        background: '#0B0F14',
                        card: '#121821',
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* Smooth Zoom Animation for Active Slide */
        .swiper-slide .slide-bg {
            transform: scale(1);
            transition: transform 6s ease-out;
        }

        .swiper-slide-active .slide-bg {
            transform: scale(1.1);
        }

        /* Swiper Pagination Customization */
        .swiper-pagination-bullet {
            background-color: rgba(255, 255, 255, 0.5) !important;
            transition: all 0.3s ease;
            width: 8px;
            height: 8px;
        }

        .swiper-pagination-bullet-active {
            background-color: #8b5cf6 !important;
            /* Tailwind violet-500 */
            width: 24px;
            border-radius: 4px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0B0F14;
        }

        ::-webkit-scrollbar-thumb {
            background: #374151;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4B5563;
        }
    </style>
</head>

<body class="bg-background text-white font-sans antialiased min-h-screen flex flex-col lg:flex-row">

    <section class="w-full lg:w-[60%] h-72 lg:h-screen relative overflow-hidden flex-shrink-0">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">

                <div class="swiper-slide relative overflow-hidden">
                    <div class="slide-bg absolute inset-0 bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#0B0F14] via-[#0B0F14]/40 to-transparent lg:from-black/80 lg:via-black/40">
                    </div>
                    <div class="absolute bottom-0 left-0 p-8 lg:p-16 z-10 w-full max-w-2xl">
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold tracking-wider text-violet-300 mb-4 uppercase">Analytics</span>
                        <h2 class="text-3xl lg:text-5xl font-bold text-white mb-4 leading-tight">Grow your business with
                            powerful tools</h2>
                        <p class="text-gray-300 text-sm lg:text-lg">Manage orders, customers, and analytics effortlessly
                            in one centralized, intuitive dashboard.</p>
                    </div>
                </div>

                <div class="swiper-slide relative overflow-hidden">
                    <div class="slide-bg absolute inset-0 bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1661956602116-aa6865609028?q=80&w=2064&auto=format&fit=crop');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#0B0F14] via-[#0B0F14]/40 to-transparent lg:from-black/80 lg:via-black/40">
                    </div>
                    <div class="absolute bottom-0 left-0 p-8 lg:p-16 z-10 w-full max-w-2xl">
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold tracking-wider text-violet-300 mb-4 uppercase">Scale</span>
                        <h2 class="text-3xl lg:text-5xl font-bold text-white mb-4 leading-tight">Scale your enterprise
                            like a pro</h2>
                        <p class="text-gray-300 text-sm lg:text-lg">Experience infinite scalability with our
                            cloud-native infrastructure designed for high-performing teams.</p>
                    </div>
                </div>

                <div class="swiper-slide relative overflow-hidden">
                    <div class="slide-bg absolute inset-0 bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#0B0F14] via-[#0B0F14]/40 to-transparent lg:from-black/80 lg:via-black/40">
                    </div>
                    <div class="absolute bottom-0 left-0 p-8 lg:p-16 z-10 w-full max-w-2xl">
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold tracking-wider text-violet-300 mb-4 uppercase">Collaborate</span>
                        <h2 class="text-3xl lg:text-5xl font-bold text-white mb-4 leading-tight">Seamless team
                            collaboration</h2>
                        <p class="text-gray-300 text-sm lg:text-lg">Break down silos. Bring your developers, designers,
                            and managers into a unified workspace.</p>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination !bottom-6 lg:!bottom-12 !left-8 lg:!left-16 !text-left !w-auto"></div>
        </div>
    </section>

    <section class="w-full lg:w-[40%] flex items-center justify-center p-6 lg:p-12 overflow-y-auto">
        <div
            class="w-full max-w-[440px] bg-card rounded-2xl shadow-2xl p-8 border border-white/5 relative z-10 mt-[-40px] lg:mt-0">

            <div class="mb-8">
                <h1 class="text-2xl lg:text-3xl font-bold text-white mb-2">Create an account</h1>
                <p class="text-gray-400 text-sm">Join us today and revolutionize your workflow.</p>
            </div>


            <form action="{{ route('admin.register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="fullName" class="block text-sm font-medium text-gray-300 mb-1.5">Username</label>
                    <input type="text" name="fullName" id="fullName" placeholder="JaneDoe"
                        value="{{ old('fullName') }}"
                        class="@error('fullName') is-invaild @enderror w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-300" required> 
                    @error('fullName')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="jane@example.com"
                        value="{{ old('email') }}"
                        class="@error('email') is-invaild @enderror w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-300" required>
                    @error('email')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Password</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}"
                            placeholder="••••••••"
                            class="@error('password') is-invaild @enderror w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-300" required>
                        @error('password')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="confirmPassword"
                            class="block text-sm font-medium text-gray-300 mb-1.5">Confirm</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                            id="confirmPassword" placeholder="••••••••" required 
                            class="@error('password_confirmation') is-invaild @enderror w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-300">
                        @error('password_confirmation')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-start pt-2">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required.
                            class="w-4 h-4 bg-white/5 border-white/10 rounded text-violet-500 focus:ring-violet-500 focus:ring-offset-background cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-400 cursor-pointer">I agree to the <a href="#"
                                class="text-violet-400 hover:text-violet-300 underline underline-offset-2 transition-colors">Terms
                                of Service</a> and <a href="#"
                                class="text-violet-400 hover:text-violet-300 underline underline-offset-2 transition-colors">Privacy
                                Policy</a>.</label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 text-white font-semibold py-3.5 mt-4 rounded-xl shadow-[0_0_20px_rgba(139,92,246,0.2)] hover:shadow-[0_0_30px_rgba(139,92,246,0.4)] hover:scale-[1.02] transition-all duration-300">
                    Create Account
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-8">
                Already have an account? <a href="{{ route('admin.login') }}"
                    class="text-violet-400 hover:text-violet-300 font-medium transition-colors">Login</a>
            </p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.mySwiper', {
                effect: 'fade', // Premium fade transition
                fadeEffect: {
                    crossFade: true
                },
                speed: 1000,
                loop: true,
                autoplay: {
                    delay: 5000, // 5 seconds per slide
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
</body>

</html>
