<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // MASS ASSIGNMENT
    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'lokasi',
        'keterangan',
        'foto',
        'status',
        'feedback',
        'foto_progress',
    ];

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELASI KE KATEGORI
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // HELPER STATUS (OPSIONAL TAPI BAGUS)
    public function isPending()
    {
        return $this->status === 'menunggu';
    }

    public function isProses()
    {
        return $this->status === 'proses';
    }

    public function isSelesai()
    {
        return $this->status === 'selesai';
    }
}