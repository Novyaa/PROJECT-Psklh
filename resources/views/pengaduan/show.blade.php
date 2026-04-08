<x-app-layout>

    <h2>Detail Pengaduan</h2>

    <p>Nama: {{ $pengaduan->user->name }}</p>
    <p>Waktu: {{ $pengaduan->created_at->format('d M Y H:i') }}</p>
    <p>Judul: {{ $pengaduan->judul }}</p>
    <p>Kategori: {{ $pengaduan->kategori->nama_kategori }}</p>
    <p>Lokasi: {{ $pengaduan->lokasi }}</p>
    <p>Keterangan: {{ $pengaduan->keterangan }}</p>
    <p>Foto Pengaduan:
    @if($pengaduan->foto)
        <img src="{{ asset('storage/' . $pengaduan->foto) }}" width="200">
    @endif
    </p>
    <p>Status: {{ $pengaduan->status }}</p>
    
    <hr>
     @if(auth()->user()->role === 'admin')

        <h3>Update Pengaduan</h3>

        <form method="POST" action="/pengaduan/{{ $pengaduan->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- STATUS --}}
            <label>Status:</label>
            <select name="status">
                <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select><br><br>

            {{-- FEEDBACK --}}
            <textarea name="feedback" placeholder="Feedback">{{ $pengaduan->feedback }}</textarea><br><br>

            {{-- FOTO PROGRESS --}}
            <p>Foto Progress:
            @if($pengaduan->foto_progress)
                <img src="{{ asset('storage/' . $pengaduan->foto_progress) }}" width="200">
            @endif
            </p>
            <input type="file" name="foto_progress"><br><br>

            <button type="submit">Update</button>
        </form>

        <hr>

        {{-- HAPUS --}}
        <form method="POST" action="/pengaduan/{{ $pengaduan->id }}">
            @csrf
            @method('DELETE')

            <button type="submit">Hapus Pengaduan</button>
        </form>

    @endif

</x-app-layout>