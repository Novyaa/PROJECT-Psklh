<x-app-layout>
    <div class="min-h-screen bg-[#F6EFE7] py-8">
        <div class="mx-auto max-w-6xl px-4">
            <div class="mb-6 rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                <h3 class="text-2xl font-bold text-black">Daftar Pengaduan</h3>
                <p class="mt-1 text-sm text-gray-500">Daftar pengaduan dari siswa.</p>
            </div>

            <div class="mb-6 rounded-2xl border border-orange-200 bg-white p-5 shadow-sm">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="grid gap-3 grid-cols-4 items-end">
                    <div>
                        <label for="nama_siswa" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">
                            Nama Siswa
                        </label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="{{ request('nama_siswa') }}"
                            placeholder="Cari nama siswa..."
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                    </div>

                    <div>
                        <label for="kategori_id" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">
                            Kategori
                        </label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="tanggal" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-black">
                            Tanggal
                        </label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}"
                            class="w-full rounded-lg border border-orange-200 px-3 py-2 text-sm text-gray-700 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-200">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                            Filter
                        </button>
                        <a href="{{ route('admin.dashboard') }}"
                            class="rounded-lg border border-orange-300 bg-white px-4 py-2 text-sm font-medium text-orange-600 transition hover:bg-orange-50">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="overflow-hidden rounded-2xl border border-orange-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-orange-100">
                        <thead class="bg-orange-100/70">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Judul</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Pelapor</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Kategori</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Tanggal</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Status</th>
                                <th class="px-6 py-4 text-right text-sm font-semibold uppercase tracking-wider text-orange-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-orange-100 bg-white">
                            @foreach($pengaduans as $p)
                                <tr class="transition hover:bg-orange-50/70">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-gray-800">
                                        {{ $p->judul }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">
                                        {{ $p->user->nama }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">
                                        {{ $p->kategori->nama_kategori ?? '-' }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">
                                        {{ $p->created_at->format('d M Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                                        <span class="inline-flex rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="/admin/pengaduan/{{ $p->id }}"
                                                class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                                                Detail
                                            </a>
                                            <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')"
                                                    class="rounded-lg border border-orange-300 bg-white px-4 py-2 text-sm font-medium text-orange-600 transition hover:bg-orange-50">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($pengaduans->isEmpty())
                    <div class="border-t border-orange-100 px-6 py-6 text-center text-sm text-orange-600">
                        Data pengaduan tidak ditemukan untuk filter yang dipilih.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
