    <header class="shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo Aplikasi -->
            <a href="#" class="text-3xl font-bold text-indigo-600">
                Connect
            </a>

            <!-- Tombol Aksi -->
            @if (Route::has('login'))
                @auth
                    <div>
                        <a wire:navigate href="{{ url('/home') }}"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-full font-semibold shadow-lg transition duration-200">
                            Dashboard
                        </a>
                    </div>
                @else
                    <div>
                        <a wire:navigate href="{{ route('register') }}"
                            class="ml-4 bg-gray-200 hover:bg-gray-300 text-gray-900 px-6 py-2 rounded-full font-semibold shadow-lg transition duration-200">
                            Daftar
                        </a>
                    </div>
                    <div>
                        <a wire:navigate href="{{ route('login') }}"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-full font-semibold shadow-lg transition duration-200">
                            Masuk
                        </a>
                    </div>
                @endauth
            @endif
        </nav>
    </header>
