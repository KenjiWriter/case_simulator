<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recentItem extends Model
{

    protected $fillable = [
        'ItemName',
        'ItemCase',
        'ItemPrice',
        'ItemChances',
        'ItemOwner',
    ];

    use HasFactory;
}
