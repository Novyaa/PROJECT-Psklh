<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-7">
            <h1 class="text-2xl flex justify-center items-center font-bold mb-1">Selamat Datang Kembali</h1>
            <p class="text-sm flex justify-center items-center text-gray-600">Silahkan masuk untuk melanjutkan!</p>
        </div>
        <div>
            <x-input-label for="nis" :value="__('NIS/ NIA')" />
            <x-text-input id="nis" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="nis" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex flex-col gap-3 items-center justify-center mt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Masuk') }}
            </x-primary-button>

            <a class="text-sm text-gray-600 font-semibold" href="{{ route('register') }}">
               Belum punya akun? <span class="text-orange-700 hover:text-orange-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">{{ __('Daftar sekarang') }}</span>  
            </a>
        </div>
    </form>
</x-guest-layout>
    <footer class="text-center text-xs text-gray-400 py-5">
        © 2026 Pengaduan Sekolah by siwi. All rights reserved.
    </footer>
