<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    public function anggota() {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    public function childs()
    {
        return $this->hasMany(Komentar::class, 'parent');
    }
}
