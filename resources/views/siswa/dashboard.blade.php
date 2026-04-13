<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Dashboard Siswa
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F6EFE7] min-h-screen">
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Total</p>
                <p class="text-2xl font-bold text-[#F97316]">{{ $total }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Menunggu</p>
                <p class="text-2xl font-bold text-yellow-500">{{ $menunggu }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Proses</p>
                <p class="text-2xl font-bold text-blue-500">{{ $proses }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Selesai</p>
                <p class="text-2xl font-bold text-green-500">{{ $selesai }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow mb-8">
            <h3 class="text-lg font-semibold mb-4 text-[#1b1b18]">
                Ajukan Pengaduan
            </h3>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-600 p-3 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="/pengaduan" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <input type="text" name="judul" placeholder="Judul"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-300 outline-none">

                <input type="text" name="lokasi" placeholder="Lokasi"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-300 outline-none">

                <select name="kategori_id"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-300 outline-none">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>

                <input type="file" name="foto" accept="image/*"
                    class="w-full border rounded-lg px-4 py-2 bg-white">

                <textarea name="keterangan" placeholder="Deskripsi"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-300 outline-none"></textarea>

                <button type="submit"
                    class="bg-[#F97316] text-white w-full py-2 rounded-lg hover:bg-[#EA580C] transition">
                    Kirim Pengaduan
                </button>
            </form>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-4 text-[#1b1b18]">
                Riwayat Pengaduan
            </h3>

            <div class="space-y-4">
                @foreach($pengaduans as $p)
                    <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $p->foto) }}"
                                class="w-20 h-20 object-cover rounded-lg">

                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $p->judul }}</h4>
                                <p class="text-sm text-gray-500">Status:
                                    <span class="font-medium text-[#F97316]">
                                        {{ $p->status }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3 text-sm">
                            <a href="/pengaduan/{{ $p->id }}"
                                class="text-white font-bold  bg-orange-400 rounded-md hover:bg-orange-300 px-2 py-1">
                                Detail
                            </a>

                            @if($p->user_id == auth()->id() && $p->status === 'menunggu')
                                <a href="/pengaduan/{{ $p->id }}/edit"
                                    class="text-orange-400 font-bold  bg-white rounded-md hover:bg-gray-100 px-2 py-1">
                                    Edit
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-app-layout>
