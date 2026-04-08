<x-app-layout>

    <x-slot name="header">
        Dashboard Siswa
    </x-slot>

    <div>

        {{-- ===================== --}}
        {{-- STATISTIK --}}
        {{-- ===================== --}}
        <h3>Statistik</h3>
        <ul>
            <li>Total: {{ $total }}</li>
            <li>Menunggu: {{ $menunggu }}</li>
            <li>Proses: {{ $proses }}</li>
            <li>Selesai: {{ $selesai }}</li>
        </ul>

        <hr>

        {{-- ===================== --}}
        {{-- FORM TAMBAH --}}
        {{-- ===================== --}}
        <h3>Ajukan Pengaduan</h3>
        @if ($errors->any())
        <div>
                @foreach ($errors->all() as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/pengaduan" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="judul" placeholder="Judul"><br>
            <input type="text" name="lokasi" placeholder="Lokasi"><br>

            <select name="kategori_id">
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select><br>

            <input type="file" name="foto"><br>

            <textarea name="keterangan" placeholder="Deskripsi"></textarea><br>

            <button type="submit">Kirim Pengaduan</button>
        </form>

        <hr>

        {{-- RIWAYAT --}}
        <h3>Riwayat Pengaduan</h3>

        @foreach($pengaduans as $p)
            <div>
                <h4>{{ $p->judul }}</h4>
                <p>Status: {{ $p->status }}</p>
                <img src="{{ asset('storage/' . $p->foto) }}" width="100">

                <a href="/pengaduan/{{ $p->id }}">Detail</a>

                @if($p->user_id == auth()->id())
                    | <a href="/pengaduan/{{ $p->id }}/edit">Edit</a>
                @endif
            </div>
            <hr>
        @endforeach

    </div>

</x-app-layout>