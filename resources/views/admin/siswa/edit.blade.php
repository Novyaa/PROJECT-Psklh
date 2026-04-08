<x-app-layout>

<h2>Edit Siswa</h2>

<form action="/siswa/{{ $siswa->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $siswa->nama }}"><br>
    <input type="text" name="nis" value="{{ $siswa->nis }}"><br>

    <button type="submit">Update</button>
</form>

</x-app-layout>