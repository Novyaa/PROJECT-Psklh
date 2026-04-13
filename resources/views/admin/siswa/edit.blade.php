<x-app-layout>
    <div class="min-h-screen bg-[#F6EFE7] px-4 py-10">
        <div class="mx-auto flex min-h-[70vh] w-full max-w-5xl items-center justify-center">
            <div class="w-full max-w-md rounded-2xl border border-orange-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-3 flex justify-end">
                    <a href="/siswa" class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                        Back
                    </a>
                </div>

                <h2 class="text-center text-2xl font-bold text-black">Edit Siswa</h2>
                <p class="mt-1 text-center text-sm text-grey-500">Perbarui data siswa dengan benar.</p>

                @if ($errors->any())
                    <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/siswa/{{ $siswa->id }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                    </div>

                    <div>
                        <label for="nis" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">NIS</label>
                        <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
