<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TentangSaya extends Model
{
    use HasFactory;
    public $table = 'tentang_saya';
    protected $tableName = 'tentang_saya';
    protected $fillable = [
        'info_id',
        'biografi'
    ];

    public function informasidasar(): BelongsTo {
        return $this->belongsTo(InformasiDasar::class, 'info_id', 'id');
    }

}
