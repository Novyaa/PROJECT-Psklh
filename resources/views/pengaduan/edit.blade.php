<x-app-layout>
    <div class="min-h-screen bg-orange-50/70 px-4 py-10">
        <div class="mx-auto flex min-h-[70vh] w-full max-w-6xl items-center justify-center">
            <div class="w-full max-w-3xl rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                <h2 class="mb-1 text-center text-2xl font-bold text-black">Edit Pengaduan</h2>
                <p class="mb-6 text-center text-sm text-black">Perbarui data pengaduan di bawah ini.</p>

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/pengaduan/{{ $pengaduan->id }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="judul" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">Judul</label>
                            <input type="text" id="judul" name="judul" value="{{ old('judul', $pengaduan->judul) }}" placeholder="Judul"
                                class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-black focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                        </div>

                        <div>
                            <label for="lokasi" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $pengaduan->lokasi) }}" placeholder="Lokasi"
                                class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-black focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                        </div>
                    </div>

                    <div>
                        <label for="kategori_id" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">Kategori</label>
                        <select id="kategori_id" name="kategori_id"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-black focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}" {{ $pengaduan->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="keterangan" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4" placeholder="Keterangan"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-black focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">{{ old('keterangan', $pengaduan->keterangan) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-black">Foto</p>
                            @if($pengaduan->foto)
                                <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                                    class="max-h-44 w-full rounded-lg border border-orange-200 object-cover">
                            @else
                                <p class="text-sm text-black">Tidak ada foto</p>
                            @endif
                        </div>

                        <div>
                            <label for="foto" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-black">Ganti Foto (Opsional)</label>
                            <input type="file" id="foto" name="foto"
                                class="w-full rounded-lg border border-orange-200 bg-white px-3 py-2 text-sm text-black focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                        </div>
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
