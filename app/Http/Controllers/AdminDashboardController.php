<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $query = Pengaduan::with('user', 'kategori')->latest();

        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filled('nama_siswa')) {
            $namaSiswa = $request->nama_siswa;
            $query->whereHas('user', function ($q) use ($namaSiswa) {
                $q->where('nama', 'like', '%' . $namaSiswa . '%');
            });
        }

        $pengaduans = $query->get();
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('admin.dashboard', compact('pengaduans', 'kategoris'));
    }
}
