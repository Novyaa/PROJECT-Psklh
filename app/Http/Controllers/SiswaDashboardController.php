<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Kategori;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengaduans = Pengaduan::where('user_id',$user->id)->latest()->get();
        $kategoris = Kategori::all();
        
        $total = $pengaduans->count();
        $menunggu = $pengaduans->where('status', 'menunggu')->count();
        $proses = $pengaduans->where('status', 'proses')->count();
        $selesai = $pengaduans->where('status', 'selesai')->count();

        return view('siswa.dashboard', compact(
            'user',
            'pengaduans',
            'kategoris',
            'total',
            'menunggu',
            'proses',
            'selesai'
        ));
    }
}
