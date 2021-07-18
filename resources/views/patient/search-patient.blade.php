@extends('includes.template')
@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            Results
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr><th>Name</th><th>Address</th><th>Birthday</th><th></th></tr>
                </thead>
                <tbody>
                    @foreach ($results as $patient)

                    <tr>
                        <td>{{Str::upper($patient->lname . ', ' . $patient->fname . ( $patient->mname ? ' ' . $patient->mname : '') ) }}</td>
                        <td>{{Str::upper($patient->address)}}</td>
                        <td>{{$patient->birthdate ?? ''}} {{ $patient->age ? '(' . $patient->age . ')' : ''}}</td>
                        <td><a href="/patient/{{$patient->id}}" class="btn btn-info">Open</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


@stop
