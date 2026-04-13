<x-app-layout>
    <x-slot name="header">
        <span class="text-xl font-semibold text-black">Detail Pengaduan</span>
    </x-slot>
    <div class="min-h-screen bg-[#F6EFE7] py-8">
        <div class="mx-auto max-w-6xl space-y-6 px-4">
            <div class="rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-orange-700">Informasi Pengaduan</h3>
                <div class="grid gap-4 text-sm text-gray-700 grid-cols-2">
                    <p><span class="font-semibold text-orange-700">Nama:</span> {{ $pengaduan->user->nama }}</p>
                    <p><span class="font-semibold text-orange-700">Waktu:</span> {{ $pengaduan->created_at->format('d M Y') }}</p>
                    <p><span class="font-semibold text-orange-700">Judul:</span> {{ $pengaduan->judul }}</p>
                    <p><span class="font-semibold text-orange-700">Kategori:</span> {{ $pengaduan->kategori->nama_kategori }}</p>
                    <p><span class="font-semibold text-orange-700">Lokasi:</span> {{ $pengaduan->lokasi }}</p>
                    <p>
                        <span class="font-semibold text-orange-700">Status:</span>
                        <span class="ml-1 inline-flex rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                            {{ $pengaduan->status }}
                        </span>
                    </p>
                    <div class="col-span-2">
                        <p><span class="font-semibold text-orange-700">Keterangan:</span> {{ $pengaduan->keterangan }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="mb-2 font-semibold text-orange-700">Foto Pengaduan:</p>
                        @if($pengaduan->foto)
                            <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                                class="max-h-72 w-full max-w-md rounded-lg border border-orange-200 object-cover">
                        @else
                            <p class="text-sm text-orange-500">Tidak ada foto pengaduan.</p>
                        @endif
                    </div>
                </div>
            </div>

            @if(auth()->user()->role === 'siswa')
                <div class="rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                    <h3 class="mb-3 text-lg font-semibold text-orange-700">Feedback Admin</h3>
                    @if(!empty($pengaduan->feedback))
                        <p class="rounded-lg bg-orange-50 px-4 py-3 text-sm text-gray-700">
                            {{ $pengaduan->feedback }}
                        </p>
                    @else
                        <p class="text-sm text-orange-500">Belum ada feedback dari admin untuk pengaduan ini.</p>
                    @endif

                    <div class="mt-5">
                        <p class="mb-2 text-sm font-semibold text-orange-700">Foto Progress</p>
                        @if($pengaduan->foto_progress)
                            <img src="{{ asset('storage/' . $pengaduan->foto_progress) }}"
                                class="max-h-72 w-full max-w-md rounded-lg border border-orange-200 object-cover">
                        @else
                            <p class="text-sm text-orange-500">Belum ada foto progress dari admin.</p>
                        @endif
                    </div>
                </div>
            @endif

            @if(auth()->user()->role === 'admin')
                <div class="mx-auto w-full max-w-6xl rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                    <h3 class="mb-4 text-lg font-semibold text-orange-700">Update Pengaduan</h3>

                    <form method="POST" action="/pengaduan/{{ $pengaduan->id }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-4 grid-cols-2">
                            <div>
                                <label class="mb-1 block text-xs font-semibold uppercase tracking-wide text-orange-700">Status</label>
                                <select name="status"
                                    class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                                    <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>

                            <div>
                                <label class="mb-1 block text-xs font-semibold uppercase tracking-wide text-orange-700">Foto Progress</label>
                                <input type="file" name="foto_progress" accept="image/*"
                                    class="w-full rounded-lg border border-orange-200 bg-white px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                            </div>
                        </div>

                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wide text-orange-700">Feedback</label>
                            <textarea name="feedback" placeholder="Feedback"
                                class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">{{ $pengaduan->feedback }}</textarea>
                        </div>

                        <div>
                            <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-orange-700">Foto Progress Saat Ini</p>
                            @if($pengaduan->foto_progress)
                                <img src="{{ asset('storage/' . $pengaduan->foto_progress) }}"
                                    class="max-h-72 w-full max-w-md rounded-lg border border-orange-200 object-cover">
                            @else
                                <p class="text-sm text-orange-500">Belum ada foto progress.</p>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                            <button type="submit"
                                class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                                Update
                            </button>
                        </div>
                    </form>

                    <div class="mt-2 border-t border-orange-100 pt-2">
                        <form method="POST" action="/pengaduan/{{ $pengaduan->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')"
                                class="rounded-lg border border-red-300 bg-white px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-50">
                                Hapus Pengaduan
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
