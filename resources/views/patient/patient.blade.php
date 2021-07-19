@extends('includes.template')
@section('content')

<div class="container">

    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

    @endif
    <div class="card">
        <div class="card-header">Patient Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form action="/patient/{{$patient->id}}" method="post">
                        <table class="table">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" value="{{$patient->id}}">
                            <tr>
                                <th class="col-2">Last Name</th><td class="col-10"><input class="form-control" type="text" name="lname" value="{{Str::upper($patient->lname) }}" required></td>
                            </tr>
                            <tr>
                                <th class="col-2">First Name</th><td class="col-10"><input class="form-control" type="text" name="fname" value="{{Str::upper($patient->fname) }}" required></td>
                            </tr>
                            <tr>
                                <th class="col-2">Middle Name</th><td class="col-10"><input class="form-control" type="text" name="mname" value="{{Str::upper( $patient->mname ?? '' ) }}"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Birthdate</th><td class="col-10"><input type="text" name="birthdate" value="{{$patient->birthdate ?? ''}}"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Gender</th><td class="col-10">
                                    <select name="sex" id="sex" class=" col-sm-4 mb-3">
                                        <option value="na" {{($patient->sex == 'na' ? 'selected' : '')}}>NA</option>
                                        <option value="m" {{($patient->sex == 'm' ? 'selected' : '')}}>Male</option>
                                        <option value="f" {{($patient->sex == 'f' ? 'selected' : '')}}>Female</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th class="col-2">Contact Number</th><td class="col-10"><input class="form-control" type="text" name="contact_no" value="{{Str::upper($patient->contact_no)}}"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Civil Status</th><td class="col-10">

                                    <select name="civil_stat" id="civil_stat" class=" col-sm-4 mb-3">
                                        <option value="S"  {{($patient->civil_stat == 'S' ? 'selected' : '')}}>Single</option>
                                        <option value="M"  {{($patient->civil_stat == 'M' ? 'selected' : '')}}>Married</option>
                                        <option value="C"  {{($patient->civil_stat == 'C' ? 'selected' : '')}}>Child</option>
                                        <option value="W"  {{($patient->civil_stat == 'W' ? 'selected' : '')}}>Widow/er</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Occupation</th><td class="col-10"><input class="form-control" type="text" name="occupation" value="{{$patient->occupation}}"></td>
                            </tr>
                            <tr>
                                <th class="col-2">HMO</th><td class="col-10"><input class="form-control" type="text" name="hmo" value="{{$patient->hmo}}"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success float-right">Update Patient Information</button>
                    </form>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Visits <span class="float-right"><button class="btn btn-success btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg">New Record</button></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($visits as $v)
                                <li class="list-group-item"><a href="/visit/{{$v->id}}">{{Carbon\Carbon::parse($v->created_at)->format("m-d-Y H:i a")}}</a>, {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>



@stop
