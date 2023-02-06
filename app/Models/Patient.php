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
        'address',
        'temp_id',
        'user_id'
    ];

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function vitals(){
        return $this->hasMany(VitalSign::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function vaccines(){
        return $this->hasMany(Vaccine::class);
    }
    public function goToPatientPage($id, $message = null){

        $patient = self::whereId($id)->first();
        $visits = $patient->visits()->get();
        $vitals = $patient->vitals()->get();
        $vaccines = $patient->vaccines()->get();

        $log = new ActivityLog();
        $log->patient_id = $patient->id;
        $log->save();
        return view('patient.patient')->with(['patient' => $patient, 'visits' => $visits, 'vitals' => $vitals, 'success' => $message, 'vaccines' => $vaccines]);
    }
}
