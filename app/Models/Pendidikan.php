<?php

namespace App\Models;

use App\Models\InformasiDasar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendidikan extends Model
{
    use HasFactory;
    public $table = 'pendidikan';
    protected $tableName = 'pendidikan';
    protected $fillable = [
        'info_id',
        'nama_prodi',
        'nama_lembaga',
        'tahun',
        'informasi_relevan'
    ];

    public function informasidasar(): BelongsTo {
        return $this->belongsTo(InformasiDasar::class, 'info_id', 'id');
    }

}
