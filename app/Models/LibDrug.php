<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibDrug extends Model
{
    use HasFactory;
    protected $table = "lib_drugs";
    protected $fillable = [
        'id',
        'drug_id',
        'drug_name'
    ];
}
