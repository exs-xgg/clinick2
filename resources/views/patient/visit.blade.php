@extends('includes.template')
@section('content')

<div class="container">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

    @endif
    <form action="/visit/{{$visit->id}}" method="post">
        <div class="card border-success">
            <div class="card-header">
                Patient Record #{{$visit->id}} <span class="float-right"><button class="btn btn-success btn-sm" type="submit">Update Record</button></span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#ptInfo" role="button" aria-expanded="false" aria-controls="ptInfo">Patient Information (click to expand)<span class="float-right"><a href="/patient/{{$patient->id}}">View Whole Profile</a></span></div>
                            <div class="card-body collapse " id="ptInfo">
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
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$visit->id}}">
                    <div class="col-6 mb-2">
                        <div class="card bg-success">
                            <div class="card-header text-white">
                                HX
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="history" id="" cols="30" rows="10">{{$visit->history}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card bg-info">
                            <div class="card-header">
                                Symptoms
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="symptoms" id="symptoms" cols="30" rows="10">{{$visit->symptoms}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card bg-danger ">
                            <div class="card-header text-white">
                                DX
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="diagnosis" id="" cols="30" rows="10">{{$visit->diagnosis}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card bg-warning">
                            <div class="card-header">
                                Prescriptions/THA
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="prescription" id="prescription" cols="30" rows="10">{{$visit->prescription}}</textarea>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </form>
</div>


@stop
