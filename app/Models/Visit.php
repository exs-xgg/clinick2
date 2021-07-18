<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;
    protected $table = 'visits';
    protected $fillable = [
        'patient_id',
        'history',
        'symptoms',
        'diagnosis',
        'prescription'
    ];
}
