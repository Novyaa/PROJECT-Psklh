<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // RELASI
    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }

    // MASS ASSIGNMENT
    protected $fillable = [
        'nama',
        'nis',
        'password',
        'role',
    ];

    // HIDDEN
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // CAST
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // HELPER ROLE (OPSIONAL TAPI SANGAT DISARANKAN)
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }
}