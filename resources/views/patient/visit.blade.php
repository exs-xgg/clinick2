@extends('includes.template')
@section('content')

<div class="container">
    <div class="card border-success">
        <div class="card-header">
            Patient Record #{{$visit->id}}
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-12 col-sm-12">
                    <div class="card border-danger">
                        <div class="card-header">Patient Information<span class="float-right"><a href="/patient/{{$patient->id}}">View Profile</a></span></div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th class="col-2">Name</th><td class="col-10">{{Str::upper($patient->lname . ', ' . $patient->fname . ( $patient->mname ? ' ' . $patient->mname : '') ) }}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">Birthdate</th><td class="col-10">{{$patient->birthdate ?? ''}} {{ $patient->age ? '(' . $patient->age . ')' : ''}}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">Gender</th><td class="col-10">{{Str::upper($patient->sex)}}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">Contact Number</th><td class="col-10">{{Str::upper($patient->contact_no)}}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">Civil Status</th><td class="col-10">{{Str::upper($patient->civil_stat)}}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">Occupation</th><td class="col-10">{{Str::upper($patient->occupation)}}</td>
                                </tr>
                                <tr>
                                    <th class="col-2">HMO</th><td class="col-10">{{Str::upper($patient->hmo)}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-none">
                    <div class="card">
                        <div class="card-header">Vitals <span class="float-right"><button class="btn btn-success btn-sm">Add Vitals</button></span></div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th>Date/Time</th><th>Temp</th><th>WT</th><th>BP</th><th>RR</th><th>HR</th><th></th>
                                </tr>
                                <tr>
                                    <td>{{Carbon\Carbon::now()->format('m-d-Y H:i a')}}</td>
                                    <td>35.2 &#176;C</td>
                                    <td>56 kg</td>
                                    <td>130/110</td>
                                    <td>18</td>
                                    <td>80</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-success">
                            History
                        </div>
                        <div class="card-body">
                            <textarea class="form-control col-12" name="history" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
