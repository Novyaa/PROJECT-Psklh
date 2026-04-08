<x-app-layout>

<h2>Tambah Siswa</h2>

<form action="/siswa" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama"><br>
    <input type="text" name="nis" placeholder="NIS"><br>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Simpan</button>
</form>

</x-app-layout>
