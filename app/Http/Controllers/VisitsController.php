<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Patient;
use App\Models\Image;
use Illuminate\Http\Request;
use Storage;
class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $visit = Visit::create($request->only((new Visit)->getFillable()));
        return redirect('/visit/' . $visit->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visits, $id)
    {
        $visit = Visit::whereId($id)->first();
        $patient_info = Patient::whereId($visit->patient_id)->first();
        $images = Image::wherePatientId($visit->patient_id)->get();
        return view('patient.visit')->with(['visit' => $visit, 'patient' => $patient_info, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visits)
    {

        $result = Visit::where('id', $request->id)->update($request->only((new Visit)->getFillable()));

        return redirect('/visit/' . $request->id)->with('success','Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visits)
    {
        //
    }
}
