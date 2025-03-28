<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BeKomentarrita;

class Berita extends Model
{
    use HasFactory;
    public function anggota() {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    public function kategori_berita() {
        return $this->belongsTo(Kategori_berita::class, 'id_kategori_berita');
    }
    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'id_berita');
    }
}
