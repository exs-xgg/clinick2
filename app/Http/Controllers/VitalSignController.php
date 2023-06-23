<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\VitalSign;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class VitalSignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['PARACETAMOL','ASCORBIC ACID', 'CETIRIZINE'];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VitalSign::create($request->only((new VitalSign)->getFillable()));
        return Patient::goToPatientPage($request->patient_id, 'Vitals Recorded Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function show(VitalSign $vitalSign, $id)
    {
        $vitals = VitalSign::whereId($id)->first();
        return $vitals;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function edit(VitalSign $vitalSign)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VitalSign $vitalSign, $id)
    {
        $result = VitalSign::where('id', $id)->update($request->only((new VitalSign)->getFillable()));

        return Patient::goToPatientPage($request->patient_id, 'Vitals Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function destroy(VitalSign $vitalSign, $id)
    {


        $vital_sign = VitalSign::whereId($id)->first();
        $patient = Patient::whereId($vital_sign->patient_id)->first();

        return Patient::goToPatientPage($vital_sign->patient_id);
    }
}
