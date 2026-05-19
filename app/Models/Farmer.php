<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = [
        'nama',
        'lokasi',
        'kontak',
        'status_ketersediaan',
        'catatan',
    ];
}
