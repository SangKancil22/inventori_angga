<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasukDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_masuk_id',
        'barang_id',
        'qty',
        'harga',
        'total_harga',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            !empty($filters['date_from']) && !empty($filters['date_to']),
            function ($query) use ($filters) {
                $query->whereHas('barangMasuk', function ($query) use ($filters) {
                    $query->whereBetween('tgl_masuk', [$filters['date_from'], $filters['date_to']]);
                });
            }
        );
    }

    public function barangMasuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
