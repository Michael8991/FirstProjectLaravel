<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = ['id','ownerNameReservation','ownerSurnameReservation','TotalPeople','Experience','experience_id','reservation_date','reservation_time'];

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'experience_id');
    }

    public function completedForm()
    {
        return $this->hasMany(CompletedForm::class, 'reservation_id');
    }
}
