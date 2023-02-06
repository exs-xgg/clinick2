<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $fillable = [
        'patient_id',
        'vaccine_id',
        'date_administered',
        'user_id'
    ];
}
