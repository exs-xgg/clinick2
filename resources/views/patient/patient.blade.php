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
                        <button class="btn btn-success mb-3"  data-toggle="modal" data-target=".bd-example-modal-lg">New Record</button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/visit" method="post">
                                        @csrf
                                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                        <div class="form-group">
                                          <label for="history" class="col-form-label">History</label>
                                          <textarea class="form-control" id="history" name="history" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="symptoms" class="col-form-label">Symptoms</label>
                                          <textarea class="form-control" id="symptoms" name="symptoms" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                          <textarea class="form-control" id="diagnosis" name="diagnosis" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="prescription" class="col-form-label">Prescription</label>
                                          <textarea class="form-control" id="prescription" name="prescription" maxlength="250"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save Record</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            </div>
                        </div>
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
