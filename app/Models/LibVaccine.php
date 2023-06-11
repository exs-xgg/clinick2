<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibVaccine extends Model
{
    use HasFactory;
    protected $table = 'lib_vaccines';
    protected $fillable = [
        'vax_id',
        'vax_name'
    ];
}
