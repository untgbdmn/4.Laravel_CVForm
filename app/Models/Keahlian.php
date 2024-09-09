<?php

namespace App\Models;

use App\Models\InformasiDasar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keahlian extends Model
{
    use HasFactory;
    public $table = 'keahlian';
    protected $tableName = 'keahlian';
    protected $fillable = [
        'info_id',
        'nama_keahlian',
        'level_keahlian'
    ];

    public function informasidasar(): BelongsTo {
        return $this->belongsTo(InformasiDasar::class, 'info_id', 'id');
    }

}
