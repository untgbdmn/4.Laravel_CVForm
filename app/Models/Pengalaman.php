<?php

namespace App\Models;

use App\Models\InformasiDasar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengalaman extends Model
{
    use HasFactory;
    public $table = 'pengalaman';
    protected $tableName = 'pengalaman';
    protected $fillable = [
        'info_id',
        'posisi_pekerjaan',
        'nama_perusahaan',
        'tahun',
        'informasi_relevan'
    ];

    public function informasidasar(): BelongsTo {
        return $this->belongsTo(InformasiDasar::class, 'info_id', 'id');
    }
}
