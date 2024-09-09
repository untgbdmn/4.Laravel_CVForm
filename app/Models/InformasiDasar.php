<?php

namespace App\Models;

use App\Models\Keahlian;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\TentangSaya;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InformasiDasar extends Model
{
    use HasFactory;
    public $table = 'informasi_dasar';
    protected $tableName = 'informasi_dasar';
    protected $fillable = [
        'nama',
        'title',
        'email',
        'no_hp',
        'alamat',
        'foto'
    ];

    // Eloquent Relations
    // 1. Tentang Saya
    public function tentangsaya(): HasOne {
        return $this->hasOne(TentangSaya::class,'info_id','id');
    }

    // 2. Keahlian
    public function keahlian(): HasMany {
        return $this->hasMany(Keahlian::class,'info_id','id');
    }

    // 3. Pendidikan
    public function pendidikan(): HasMany {
        return $this->hasMany(Pendidikan::class,'info_id','id');
    }

    // 4. Pengalaman
    public function pengalaman(): HasMany {
        return $this->hasMany(Pengalaman::class,'info_id','id');
    }
}
