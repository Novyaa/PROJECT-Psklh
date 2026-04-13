<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" >
        @csrf
        <div class="mb-7">
            <h1 class="text-2xl flex justify-center items-center font-bold mb-1">Buat Akun Baru</h1>
            <p class="text-sm flex justify-center items-center text-gray-600">Silahkan lengkapi data diri anda untuk mendaftar</p>
        </div>
        <div>
            <x-input-label for="nama" :value="__('Name')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nis" :value="__('NIS')" />
            <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required />
            <x-input-error :messages="$errors->get('nis')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-3 items-center justify-center mt-4">

            <x-primary-button class="w-full justify-center ">
                {{ __('Daftar Sekarang') }}
            </x-primary-button>

            <a class="text-sm text-gray-600 font-semibold" href="{{ route('login') }}">
               Sudah punya akun? <span class="text-orange-700 hover:text-orange-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">{{ __('Masuk di sini') }}</span>  
            </a>
            
        </div>
    </form>
</x-guest-layout>
    <footer class="text-center text-xs text-gray-400 py-5">
        © 2026 Pengaduan Sekolah by siwi. All rights reserved.
    </footer>
