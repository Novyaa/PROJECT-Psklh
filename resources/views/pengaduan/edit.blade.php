<x-app-layout>

    <h2>Edit Pengaduan</h2>

    <form method="POST" action="/pengaduan/{{ $pengaduan->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <input type="text" name="judul" value="{{ $pengaduan->judul }}" placeholder="Judul"><br>

        {{-- Lokasi --}}
        <input type="text" name="lokasi" value="{{ $pengaduan->lokasi }}" placeholder="Lokasi"><br>

        {{-- Kategori --}}
        <select name="kategori_id">
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}" 
                    {{ $pengaduan->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select><br>

        {{-- Keterangan --}}
        <textarea name="keterangan" placeholder="Keterangan">
{{ $pengaduan->keterangan }}
        </textarea><br>

        {{-- FOTO LAMA --}}
        <p>Foto Lama:</p>
        @if($pengaduan->foto)
            <img src="{{ asset('storage/' . $pengaduan->foto) }}" width="150"><br>
        @else
            <p>Tidak ada foto</p>
        @endif

        {{-- FOTO BARU --}}
        <p>Ganti Foto (opsional):</p>
        <input type="file" name="foto"><br>

        <button type="submit">Update</button>
    </form>

</x-app-layout>