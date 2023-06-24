<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
        'user_id',
        'mothers_name',
        'fathers_name',
        'emergency_contact_no'
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
    private function transformVaccine($vaccine_array){
        // {"id":1,"patient_id":334,"vaccine_id":"ROTA1","date_administered":"2023-02-06","user_id":1,"created_at":"2023-02-05T16:00:00.000000Z","updated_at":"2023-02-05T16:00:00.000000Z"}
        $transformed_vax_array = [];
        foreach($vaccine_array as $vaccine){
            $transformed_vax_array[$vaccine->vaccine_id] = ['date_administered' => $vaccine->date_administered];
        }
        return $transformed_vax_array;
    }
    public function goToPatientPage($id, $message = null){
        $date_diff = 'Unable to calculate age. Invalid birthdate provided';
        $patient = self::whereId($id)->first();
        $visits = $patient->visits()->get();
        $vitals = $patient->vitals()->get();
        $vaccines = $patient->vaccines()->get();
        $vaccines_array = $patient->vaccines()->get(['vaccine_id']);
        $lib_vaccines = LibVaccine::whereNotIn('vax_name',$vaccines_array)->orderBy('vax_name', 'asc')->get();

        $log = new ActivityLog();
        $log->patient_id = $patient->id;
        $log->save();
        try{
            if ((Carbon::parse($patient->birthdate)->diff(Carbon::now())->format('%y years, %m months and %d days') !== false)) {
                $date_diff = Carbon::parse($patient->birthdate)->diff(Carbon::now())->format('%y years, %m months and %d days');
            }else{
                $date_diff = "-";
            }
        }catch(\Carbon\Exceptions\InvalidFormatException $e){

        }

        return view('patient.patient')->with(['patient' => $patient, 'visits' => $visits, 'vitals' => $vitals, 'success' => $message, 'vaccines' => self::transformVaccine($vaccines), 'lib_vaccines' => $lib_vaccines, 'date_diff' => $date_diff]);
    }
}
