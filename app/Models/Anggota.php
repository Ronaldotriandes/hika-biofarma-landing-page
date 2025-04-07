<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Authenticatable
{
    use HasFactory,SoftDeletes;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Asia/Jakarta');
    }
    public function strukturOrganisasi() {
        return $this->belongsTo(StrukturOrganisasi::class, 'id_struktur_organisasi');
    }
}
