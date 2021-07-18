<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'birthdate',
        'sex',
        'age',
        'contact_no',
        'civil_stat',
        'occupation',
        'hmo',
        'address'
    ];

    public function visits(){
        return $this->hasMany(Visits::class);
    }
}
