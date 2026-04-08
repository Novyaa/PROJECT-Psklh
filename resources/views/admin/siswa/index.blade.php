<x-app-layout>

    <h2>Data Siswa</h2>

    <a href="/siswa/create">+ Tambah Siswa</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Aksi</th>
        </tr>

        @foreach($siswas as $s)
        <tr>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->nis }}</td>
            <td>
                <a href="/siswa/{{ $s->id }}/edit">Edit</a>

                <form action="/siswa/{{ $s->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</x-app-layout>