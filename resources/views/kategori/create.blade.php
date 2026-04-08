<x-app-layout>

<h2>Tambah Kategori</h2>

<form method="POST" action="/kategori">
    @csrf

    <input type="text" name="nama_kategori" placeholder="Nama Kategori">

    <button type="submit">Simpan</button>
</form>

</x-app-layout>