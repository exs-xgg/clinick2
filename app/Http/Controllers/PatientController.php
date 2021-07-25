<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields = [ 'lname', 'mname', 'fname', 'address'];

        $filter = $request->input('search');
        $filter = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $filter);
        $filter = explode(' ',$filter);


        $results = Patient::select();

        foreach ($filter as $bit) {
            $results->where(function($query) use ($fields,$bit) {
                foreach ($fields as $attribute) {
                    $query->orWhere($attribute , 'LIKE','%' .$bit. '%');
                }
            });
    }

        return view('patient.search-patient')->with(['results' => $results->orderBy('lname', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create-patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('patient.create-patient')->with(['patient' => Patient::create($request->only((new Patient)->getFillable()))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::whereId($id)->first();
        $visits = $patient->visits()->get();

        $log = new ActivityLog();
        $log->patient_id = $patient->id;
        $log->save();
        return view('patient.patient')->with(['patient' => $patient, 'visits' => $visits]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, Request $request, $id)
    {

        return view('patient.patient')->with(['patient' => Patient::update($request->only((new Patient)->getFillable()))->whereId($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $result = Patient::where('id', $request->id)->update($request->only((new Patient)->getFillable()));

        return redirect('/patient/' . $request->id)->with('success','Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
