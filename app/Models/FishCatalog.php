<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishCatalog extends Model
{
    protected $guarded = [];

    protected $casts = [
        'habitat' => 'array',
        'cycle' => 'array',
        'advantages' => 'array',
        'pricing' => 'array',
    ];
}
