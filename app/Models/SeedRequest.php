<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeedRequest extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_bibit',
        'jumlah_gram',
        'keterangan',
        'status',
        'catatan_admin',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_gram' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => '⏳ Menunggu',
            'diproses' => '🔄 Diproses',
            'tersedia' => '✅ Tersedia',
            'selesai' => '📦 Selesai',
            'ditolak' => '❌ Ditolak',
            default => $this->status,
        };
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'badge-amber',
            'diproses' => 'badge-blue',
            'tersedia' => 'badge-green',
            'selesai' => 'badge-slate',
            'ditolak' => 'badge-red',
            default => 'badge-slate',
        };
    }
}
