<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedForm extends Model
{
    use HasFactory;

    protected $table = 'completed_form';

    protected $fillable = ['id','DNI','Name','Surname','reservation_id','LegalText', 'fields', 'signature','created_at'];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
