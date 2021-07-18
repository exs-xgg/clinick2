@extends('includes.template')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Patient Information</div>
        <div class="card-body">
            <table class="table">
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
                <tr>
                    <th class="col-2">Visits</th>
                    <td class="col-10">
                        <button class="btn btn-success mb-3">New Visit</button>
                        <ul class="list-group">
                            @foreach ($visits as $v)
                            <li class="list-group-item"><a href="/visit/{{$v->id}}">{{Carbon\Carbon::parse($v->created_at)->toRfc822String()}}</a>, {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


@stop
