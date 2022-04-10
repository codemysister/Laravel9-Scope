<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function scopeCumlaude($query)
    {
        return $query->where('ipk', '>', '3.5');
    }

    public function scopeTanggalLahir($query)
    {
        return $query->whereYear('tanggal_lahir', '=', '2002');
    }

    public function scopeLahir($query, $tahun)
    {
        return $query->whereYear('tanggal_lahir', '=', $tahun);
    }
}
