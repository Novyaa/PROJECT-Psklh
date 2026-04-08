<x-app-layout>

<h2>Data Kategori</h2>

<a href="/kategori/create">+ Tambah Kategori</a>

<hr>

@foreach($kategoris as $k)
    <div>
        {{ $k->nama_kategori }}

        | <a href="/kategori/{{ $k->id }}/edit">Edit</a>

        <form action="/kategori/{{ $k->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </div>
@endforeach

</x-app-layout>