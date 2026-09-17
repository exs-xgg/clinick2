<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\VitalSign;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Seed patients, visits, vitals, and activity logs.
     *
     * @return void
     */
    public function run()
    {
        $patients = [
            [
                'patient' => [
                    'fname' => 'Maria',
                    'lname' => 'Reyes',
                    'mname' => 'Santos',
                    'birthdate' => '03/12/1988',
                    'sex' => 'f',
                    'age' => 36,
                    'contact_no' => '09171234567',
                    'civil_stat' => 'M',
                    'occupation' => 'Teacher',
                    'hmo' => 'PhilHealth',
                    'address' => 'Quezon City',
                ],
                'visit' => [
                    'history' => 'Hypertension, on amlodipine',
                    'symptoms' => 'Headache, dizziness',
                    'diagnosis' => 'Uncontrolled hypertension',
                    'prescription' => 'Amlodipine 5mg once daily',
                    'alias_created_at' => '2026-09-01 09:30:00',
                ],
                'vitals' => [
                    'temp' => '36.8',
                    'weight' => '62',
                    'height' => '158',
                    'bp' => '130',
                    'rr' => '18',
                    'hr' => '78',
                ],
            ],
            [
                'patient' => [
                    'fname' => 'Jose',
                    'lname' => 'Cruz',
                    'mname' => 'Dela',
                    'birthdate' => '07/21/1975',
                    'sex' => 'm',
                    'age' => 49,
                    'contact_no' => '09181234567',
                    'civil_stat' => 'M',
                    'occupation' => 'Driver',
                    'hmo' => 'Maxicare',
                    'address' => 'Caloocan City',
                ],
                'visit' => [
                    'history' => 'Type 2 diabetes mellitus',
                    'symptoms' => 'Polyuria, fatigue',
                    'diagnosis' => 'Diabetes mellitus, poorly controlled',
                    'prescription' => 'Metformin 500mg twice daily',
                    'alias_created_at' => '2026-09-03 14:15:00',
                ],
                'vitals' => [
                    'temp' => '36.5',
                    'weight' => '78',
                    'height' => '170',
                    'bp' => '128',
                    'rr' => '16',
                    'hr' => '82',
                ],
            ],
            [
                'patient' => [
                    'fname' => 'Ana',
                    'lname' => 'Garcia',
                    'mname' => 'Lopez',
                    'birthdate' => '11/04/1995',
                    'sex' => 'f',
                    'age' => 30,
                    'contact_no' => '09221234567',
                    'civil_stat' => 'S',
                    'occupation' => 'Nurse',
                    'hmo' => 'Intellicare',
                    'address' => 'Makati City',
                ],
                'visit' => [
                    'history' => 'Asthma since childhood',
                    'symptoms' => 'Cough, shortness of breath',
                    'diagnosis' => 'Acute asthma exacerbation',
                    'prescription' => 'Salbutamol inhaler as needed',
                    'alias_created_at' => '2026-09-05 11:00:00',
                ],
                'vitals' => [
                    'temp' => '37.1',
                    'weight' => '54',
                    'height' => '160',
                    'bp' => '110',
                    'rr' => '22',
                    'hr' => '88',
                ],
            ],
        ];

        foreach ($patients as $row) {
            $patient = Patient::create($row['patient']);

            $visit = Visit::create(array_merge($row['visit'], [
                'patient_id' => $patient->id,
            ]));

            VitalSign::create(array_merge($row['vitals'], [
                'patient_id' => $patient->id,
                'visit_id' => $visit->id,
            ]));

            ActivityLog::create([
                'patient_id' => $patient->id,
            ]);
        }
    }
}