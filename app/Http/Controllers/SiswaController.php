<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = User::where('role', 'siswa')->get();

        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $siswas = User::where('role', 'siswa')->latest()->get();
        return view('admin.siswa.create', compact('siswas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nis' => 'required|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'nama' => $request->nama,
        'nis' => $request->nis,
        'password' => Hash::make($request->password),
        'role' => 'siswa',
    ]);

    return redirect('/siswa')->with('success', 'Siswa berhasil ditambahkan');
}

public function edit($id)
{
    $siswa = User::findOrFail($id);
    return view('admin.siswa.edit', compact('siswa'));
}

public function update(Request $request, $id)
{
    $siswa = User::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'nis' => 'required|unique:users,nis,' . $id,
    ]);

    $siswa->update([
        'nama' => $request->nama,
        'nis' => $request->nis,
    ]);

    return redirect('/siswa')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    $siswa = User::findOrFail($id);
    $siswa->delete();

    return back()->with('success', 'Siswa berhasil dihapus');
}
}
