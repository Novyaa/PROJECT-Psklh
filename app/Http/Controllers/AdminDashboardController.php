<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        // ambil semua pengaduan
        $pengaduans = Pengaduan::with('user', 'kategori')->latest()->get();

        return view('admin.dashboard', compact('pengaduans'));
    }
}