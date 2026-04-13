<x-app-layout>
    <div class="min-h-screen bg-[#F6EFE7] px-4 py-10">
        <div class="mx-auto flex min-h-[70vh] w-full max-w-5xl items-center justify-center">
            <div class="w-full max-w-md rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                <div class="mb-3 flex justify-end">
                    <a href="/kategori"
                        class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                        Back
                    </a>
                </div>

                <h2 class="text-center text-2xl font-bold text-black">Edit Kategori</h2>
                <p class="mt-1 text-center text-sm text-gray-500">Perbarui nama kategori di bawah ini.</p>

                @if ($errors->any())
                    <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/kategori/{{ $kategori->id }}" class="mt-6 space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama_kategori" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-orange-700">
                            Nama Kategori
                        </label>
                        <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
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
