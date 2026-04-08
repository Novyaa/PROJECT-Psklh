<x-app-layout>

    <h3>Daftar Pengaduan</h3>

    @foreach($pengaduans as $p)
        <div>
            <h4>{{ $p->judul }}</h4>
            <p>Pelapor: {{ $p->user->nama }}</p>
            <p>Status: {{ $p->status }}</p>

            <a href="/admin/pengaduan/{{ $p->id }}">Detail</a>
        </div>
        <hr>
    @endforeach

</x-app-layout>