@extends('includes.template')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Recently Opened</div>
        <div class="card-body">
            @foreach ($recent ?? '' as $patient)

                <a href="/patient/{{$patient->id}}">{{Str::upper($patient->lname . ', ' . $patient->fname . ( $patient->mname ? ' ' . $patient->mname : '') ) }}</a> (<span>{{Carbon\Carbon::parse($patient->created_at)->format("m-d-Y H:i a")}}</a>, {{Carbon\Carbon::parse($patient->created_at)->diffForHumans()}}</span>) <br>

            @endforeach
        </div>
    </div>
</div>


@stop
