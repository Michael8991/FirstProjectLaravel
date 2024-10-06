<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;
    protected $fillable = ['id','Name','LegalText','fields'];

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'form_id');
    }
}
