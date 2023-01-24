<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;
    protected $table = 'vital_signs';
    protected $fillable = [
        'patient_id', //required
        'temp',
        'weight',
        'height',
        'bp',
        'rr',
        'hr',
        'waist',
        'pr',
        'user_id', //required
        'muac'
    ];
}
