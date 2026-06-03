<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin — Museum Semedo</title>

    @vite('resources/css/app.css')

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <!-- FIX DOUBLE ICON PASSWORD -->
    <style>
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        input[type="password"]::-webkit-credentials-auto-fill-button {
            visibility: hidden;
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex font-[Figtree] bg-[#0f2a2c]">

<!-- LEFT -->
<div class="hidden lg:flex w-1/2 relative items-center justify-start pl-16
            text-white overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
        <img src="/images/bg-login.jpg"
             class="w-full h-full object-cover scale-105 transition duration-700 ease-in-out">
    </div>

    <!-- OVERLAY (LEBIH DALAM & GRADIENT) -->
    <div class="absolute inset-0 
        bg-gradient-to-br 
        from-[#0f2a2c]/95 
        via-[#0f2a2c]/85 
        to-[#124245]/90">
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-md">

        <img src="/images/museum-icon.png" class="h-16 mb-6 opacity-90">

        <h1 class="text-3xl font-semibold mb-3 drop-shadow-md leading-snug">
            Sistem Analitik Pengunjung
        </h1>

        <p class="text-sm text-white/80 leading-relaxed">
            Kelola data kunjungan dan analisis pengunjung 
            secara real-time.
        </p>

    </div>

    <!-- SUBTLE BORDER (DETAIL PREMIUM) -->
    <div class="absolute top-0 right-0 h-full w-px bg-white/10"></div>

    <!-- GLOW EFFECT -->
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#1ecad3]/20 blur-3xl"></div>
</div>

<!-- RIGHT -->
<div class="flex w-full lg:w-1/2 items-center justify-center px-6 py-10 bg-[#f8fafc]">

    <div class="w-full max-w-md">

        <div class="bg-white/80 backdrop-blur-xl border border-white/30
                    rounded-2xl shadow-xl p-8">

            <!-- HEADER -->
            <div class="mb-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800">Selamat Datang</h2>
                <p class="text-sm text-gray-500 mt-1">
                    Masuk untuk mengakses dashboard
                </p>
            </div>

            <!-- ERROR -->
            @if($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-50 px-4 py-2 rounded-lg">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- EMAIL -->
                <div class="mb-4">
                    <label class="text-xs text-gray-500">Email</label>
                    <input type="email" name="email" required
                        value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2.5 rounded-lg border border-gray-300
                               focus:ring-2 focus:ring-[#1ecad3]/40 focus:border-[#1ecad3]
                               focus:outline-none text-sm transition">
                </div>

                <!-- PASSWORD -->
                <div class="mb-2 relative">
                    <label class="text-xs text-gray-500">Password</label>

                    <input type="password" name="password" id="passwordInput" required
                        class="w-full mt-1 px-4 py-2.5 pr-10 rounded-lg border border-gray-300
                               focus:ring-2 focus:ring-[#1ecad3]/40 focus:border-[#1ecad3]
                               focus:outline-none text-sm transition">

                    <!-- TOGGLE ICON -->
                    <button type="button" onclick="togglePassword()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 mt-3
                               text-gray-400 hover:text-gray-600 transition">

                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5
                                   c4.477 0 8.268 2.943 9.542 7
                                   -1.274 4.057-5.065 7-9.542 7
                                   -4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                    </button>
                </div>

                <!-- OPTIONS -->
                <div class="flex items-center justify-between mb-6 text-xs text-gray-500">

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-[#1ecad3] focus:ring-[#1ecad3]">
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="hover:text-gray-700 transition">
                            Lupa password
                        </a>
                    @endif

                </div>

                <!-- BUTTON -->
                <button type="submit" id="loginButton"
                    class="w-full py-2.5 rounded-lg text-sm font-medium
                           bg-[#0f2a2c] text-white
                           shadow-sm hover:shadow-md
                           hover:bg-[#124245]
                           active:scale-[0.98]
                           transition-all duration-150 flex items-center justify-center gap-2">

                    <span id="btnText">Masuk</span>

                    <svg id="loadingIcon" class="w-4 h-4 hidden animate-spin"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">

                        <circle class="opacity-25"
                            cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>

                        <path class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>

                </button>

            </form>

        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon = document.getElementById('eyeIcon');

    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

// loading state
document.getElementById('loginForm').addEventListener('submit', function() {
    const btn = document.getElementById('loginButton');
    const text = document.getElementById('btnText');
    const loading = document.getElementById('loadingIcon');

    btn.disabled = true;
    text.innerText = "Memproses...";
    loading.classList.remove('hidden');
});
</script>

</body>
</html>