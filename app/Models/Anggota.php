<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\AnggotaEncdec;

class Anggota extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $casts = [
        'email_pribadi' => \App\Casts\Anggota\AnggotaEncdec::class,
        'email_kantor' => \App\Casts\Anggota\AnggotaEncdec::class,
        'departemen_kerja' => \App\Casts\Anggota\AnggotaEncdec::class,
        'direktorat_kerja' => \App\Casts\Anggota\AnggotaEncdec::class,
        'no_hp' => \App\Casts\Anggota\AnggotaEncdec::class,
        'tanggal_lahir' => \App\Casts\Anggota\AnggotaEncdec::class,
    ];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Asia/Jakarta');
    }
    public function strukturOrganisasi()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'id_struktur_organisasi');
    }
    public function setNipAttribute($value)
    {
        $this->attributes['nip'] = trim((string) $value);
    }
    public function getNipAttribute($value)
    {
        return trim((string) $value);
    }
    public function getAuthIdentifierName()
    {
        return 'hash_email';
    }
    public function getJenisKelaminAttribute($value)
    {
        return $value === 'L' ? 'Laki-Laki' : ($value === 'P' ? 'Perempuan' : $value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Asia/Jakarta');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($anggota) {
            $anggota->hash_email = hash('sha256', $anggota->email_pribadi);
        });

        static::updating(function ($anggota) {
            if ($anggota->isDirty('email')) {
                $anggota->hash_email = hash('sha256', $anggota->email_pribadi);
            }
        });
    }
}
