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
                    <th class="col-2">First Name</th><td class="col-10">{{$patient->fname}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>


@stop
