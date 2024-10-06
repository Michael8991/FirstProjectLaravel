<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['id','ExperienceName','form_id'];

    public function forms()
    {
        return $this->belongsTo(Forms::class, 'form_id');
    }
}
