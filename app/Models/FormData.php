<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = 'forms';

    protected $fillable = ['fields'];

    protected $casts = [
        'fields' => 'array',
    ];

}
