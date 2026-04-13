<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PengaduanController extends Controller
{
    public function create()
    {
        $kategoris = Kategori::all();
        return view('pengaduan.create', compact('kategoris'));
    }

   public function store(Request $request)
{
    $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'keterangan' => 'required',
        'foto' => 'nullable|image',
    ]);

$fotoPath = null;

if ($request->hasFile('foto')) {
    $fotoPath = $request->file('foto')->store('pengaduan', 'public');
}


    Pengaduan::create([
        'user_id' => Auth::id(),
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'lokasi' => $request->lokasi,
        'keterangan' => $request->keterangan,
        'foto' => $fotoPath,
        'status' => 'menunggu',
    ]);

    return back()->with('success', 'Pengaduan berhasil dikirim');
}

    public function index()
    {
        if (Auth::user()->role !== 'admin') {
        abort(403);
    }

        $pengaduans = Pengaduan::with('user', 'kategori')->latest()->get();
        return view('admin.dashboard', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user', 'kategori')->findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // JIKA ADMIN
        if (Auth::user()->role === 'admin') {

            $fotoProgress = $pengaduan->foto_progress;

            if ($request->hasFile('foto_progress')) {
                $fotoProgress = $request->file('foto_progress')->store('progress', 'public');
            }

            $pengaduan->update([
                'status' => $request->status,
                'feedback' => $request->feedback,
                'foto_progress' => $fotoProgress,
            ]);

            return back()->with('success', 'Pengaduan berhasil diupdate');
        }

        // JIKA SISWA
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        if (! $pengaduan->canBeEditedBySiswa()) {
            abort(403, 'Pengaduan bisa di edit saat status masih menunggu.');
        }


        $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image',
        ]);

        $fotoPath = $pengaduan->foto;

        if ($request->hasFile('foto')) {
            if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan->update([
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,
            'foto' => $fotoPath,
        ]);

        return redirect('/siswa/dashboard')->with('success', 'Pengaduan berhasil diupdate');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        if (! $pengaduan->canBeEditedBySiswa()) {
            abort(403, 'Pengaduan bisa di edit saat status masih menunggu.');
        }

        $kategoris = Kategori::all();

        return view('pengaduan.edit', compact('pengaduan', 'kategoris'));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $pengaduan->user_id !== Auth::id()) {
        }

        $pengaduan->delete();

        return back()->with('success', 'Pengaduan dihapus');
    }
}
