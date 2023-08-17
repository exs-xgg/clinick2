@extends('includes.template')
@section('content')

<div class="container">

    @if ($message = Session::get('success') ?? $success)

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

    @endif
    <div class="card">
        <div class="card-header"><i class="fa fa-user mr-2"></i> Patient Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form autocomplete="off" action="/patient/{{$patient->id}}" method="post">
                        <table class="table">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" value="{{$patient->id}}">
                            <tr>
                                <th class="">Last Name</th><td class=""><input class="form-control" type="text" name="lname" value="{{Str::upper($patient->lname) }}" required></td>
                            </tr>
                            <tr>
                                <th class="">First Name</th><td class=""><input class="form-control" type="text" name="fname" value="{{Str::upper($patient->fname) }}" required></td>
                            </tr>
                            <tr>
                                <th class="">Middle Name</th><td class=""><input class="form-control" type="text" name="mname" value="{{Str::upper( $patient->mname ?? '' ) }}"></td>
                            </tr>
                            <tr>
                                <th class="">Birthdate</th>
                                <td class="">

                                    <div class="row">
                                        <div class="col-6"><input class="form-control" type="text" name="birthdate" value="{{$patient->birthdate ?? ''}}"></div>

                                        <div class="col-6">{{ $date_diff ?? '' }}</div>


                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th class="">Address</th><td class=""><input class="form-control" type="text" name="address" value="{{$patient->address ?? ''}}"></td>
                            </tr>
                            <tr>
                                <th class="">Gender</th><td class="">
                                    <select name="sex" id="sex" class=" col-sm-4 mb-3">
                                        <option value="na" {{(Str::lower($patient->sex) == 'na' ? 'selected' : '')}}>NA</option>
                                        <option value="m" {{(Str::lower($patient->sex) == 'm' ? 'selected' : '')}}>Male</option>
                                        <option value="f" {{(Str::lower($patient->sex) == 'f' ? 'selected' : '')}}>Female</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th class="">Patient's Contact Number</th><td class=""><input class="form-control" type="text" name="contact_no" value="{{Str::upper($patient->contact_no)}}"></td>
                            </tr>
                            <tr>
                                <th class="">Mother's Name</th><td class=""><input class="form-control" type="text" name="mothers_name" value="{{Str::upper($patient->mothers_name)}}"></td>
                            </tr>
                            <tr>
                                <th class="">Father's Name</th><td class=""><input class="form-control" type="text" name="fathers_name" value="{{Str::upper($patient->fathers_name)}}"></td>
                            </tr>
                            <tr>
                                <th class="">Emergency Contact Number</th><td class=""><input class="form-control" type="text" name="emergency_contact_no" value="{{Str::upper($patient->emergency_contact_no)}}"></td>
                            </tr>
                            <tr>
                                <th class="">Civil Status</th><td class="">

                                    <select name="civil_stat" id="civil_stat" class=" col-sm-4 mb-3">
                                        <option value="S"  {{($patient->civil_stat == 'S' ? 'selected' : '')}}>Single</option>
                                        <option value="M"  {{($patient->civil_stat == 'M' ? 'selected' : '')}}>Married</option>
                                        <option value="C"  {{($patient->civil_stat == 'C' ? 'selected' : '')}}>Child</option>
                                        <option value="W"  {{($patient->civil_stat == 'W' ? 'selected' : '')}}>Widow/er</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="">Occupation</th><td class=""><input class="form-control" type="text" name="occupation" value="{{$patient->occupation}}"></td>
                            </tr>
                            <tr>
                                <th class="">HMO</th><td class=""><input class="form-control" type="text" name="hmo" value="{{$patient->hmo}}"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success float-right">Update Patient Information</button>
                    </form>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card mt-3">
                        <div class="card-header text-white bg-primary">
                            <i class="fa fa-clipboard"></i>  Visits <span class="float-right"><button class="btn btn-light btn-sm"  data-toggle="modal" data-target=".visitModal">New Visit</button></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($visits as $v)
                                <li class="list-group-item">
                                    <a href="/visit/{{$v->id}}">{{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->toDayDateTimeString()}}</a>, {{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->diffForHumans()}}
                                    <br>
                                    <span class="ml-3 small">{{$v->history}}</span>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-3">

                        @include('patient.vitals')
                    </div>

                    @if (env('VACCINE')=='Y')
                    <div class="card mt-3">
                        @include('patient.vaccine')
                    </div>
                    @endif
                    {{-- VISIT MODAL --}}
                    <div class="modal fade visitModal" tabindex="-1" role="dialog" aria-labelledby="visitModal" aria-hidden="true">
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
                                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                        <div class="form-group">
                                        <label for="history" class="col-form-label">History</label>
                                        <textarea class="form-control" id="history" name="history" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="symptoms" class="col-form-label">Symptoms/PE</label>
                                        <textarea class="form-control" id="symptoms" name="symptoms" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                        <textarea class="form-control" id="diagnosis" name="diagnosis" maxlength="250"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="prescription" class="col-form-label">Prescription/THA</label>
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
