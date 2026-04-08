<x-app-layout>

<h2>Edit Kategori</h2>

<form method="POST" action="/kategori/{{ $kategori->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">

    <button type="submit">Update</button>
</form>

</x-app-layout>