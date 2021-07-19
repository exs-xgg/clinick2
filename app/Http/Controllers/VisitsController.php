<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

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
    public function show(Visits $visits, $id)
    {
        return view('patient.visit')->with(['visit' => Visit::id($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function edit(Visits $visits)
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
    public function update(Request $request, Visits $visits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visits $visits)
    {
        //
    }
}
