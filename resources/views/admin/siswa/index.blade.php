<x-app-layout>
    <div class="min-h-screen bg-[#F6EFE7] py-8">
        <div class="mx-auto max-w-6xl px-4">
            <div class="mb-6 flex flex-col gap-3 rounded-2xl border border-orange-200 bg-white p-6 shadow-sm">
                <div>
                    <h2 class="text-2xl font-bold text-black">Data Siswa</h2>
                    <p class="mt-1 text-sm text-gray-500">Kelola data siswa dengan jujur.</p>
                </div>
                <a href="/siswa/create"
                    class="inline-flex items-center justify-center rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                    + Tambah Siswa
                </a>
            </div>

            <div class="overflow-hidden rounded-2xl border border-orange-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-orange-100">
                        <thead class="bg-orange-100/70">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">Nama</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider text-orange-700">NIS</th>
                                <th class="px-6 py-4 text-right text-sm font-semibold uppercase tracking-wider text-orange-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-orange-100 bg-white">
                            @forelse($siswas as $s)
                                <tr class="transition hover:bg-orange-50/70">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800">{{ $s->nama }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700">{{ $s->nis }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="/siswa/{{ $s->id }}/edit"
                                                class="rounded-lg bg-orange-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-600">
                                                Edit
                                            </a>
                                            <form action="/siswa/{{ $s->id }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                                    class="rounded-lg border border-orange-300 bg-white px-4 py-2 text-sm font-medium text-orange-600 transition hover:bg-orange-50">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-sm text-orange-600">
                                        Belum ada data siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
