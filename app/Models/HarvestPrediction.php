<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarvestPrediction extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal_tebar',
        'berat_bibit_gram',
        'prediksi_panen_awal',
        'prediksi_panen_akhir',
        'estimasi_hasil_gram',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_tebar' => 'date',
            'prediksi_panen_awal' => 'date',
            'prediksi_panen_akhir' => 'date',
            'berat_bibit_gram' => 'decimal:2',
            'estimasi_hasil_gram' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
