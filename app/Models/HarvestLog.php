<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarvestLog extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal_panen',
        'berat_kg',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_panen' => 'date',
            'berat_kg' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
