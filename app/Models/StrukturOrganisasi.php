<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;
    protected $table = 'struktur_organisasi';
    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'id_struktur_organisasi');
    }
}
