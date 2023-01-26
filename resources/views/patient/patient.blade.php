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
        <div class="card-header"><i class="fa fa-user mr-2"></i> Patient Information</div>
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
                                        <option value="na" {{(Str::lower($patient->sex) == 'na' ? 'selected' : '')}}>NA</option>
                                        <option value="m" {{(Str::lower($patient->sex) == 'm' ? 'selected' : '')}}>Male</option>
                                        <option value="f" {{(Str::lower($patient->sex) == 'f' ? 'selected' : '')}}>Female</option>
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
                <div class="col-md-6 col-sm-12">
                    <div class="card mt-3">
                        <div class="card-header text-white bg-primary">
                            <i class="fa fa-clipboard"></i>  Visits <span class="float-right"><button class="btn btn-light btn-sm"  data-toggle="modal" data-target=".visitModal">New Visit</button></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($visits as $v)
                                <li class="list-group-item"><a href="/visit/{{$v->id}}">{{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->format("m-d-Y H:i a")}}</a>, {{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->diffForHumans()}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header text-white bg-success">
                           <i class="fa fa-stethoscope"></i> Vitals <span class="float-right"><button class="btn btn-light btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg">New Vitals</button></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($vitals as $v)
                                <li class="list-group-item" data-toggle="collapse" href="#collapseExample{{$v->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$v->id}}">{{Carbon\Carbon::parse( $v->created_at)->format("m-d-Y H:i a")}}, {{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->diffForHumans()}}</li>

                                <div class="collapse" id="collapseExample{{$v->id}}">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="height" class="col-form-label">Height</label>
                                                    <input type="text" class="form-control" id="height" name="height" value="{{$v->height }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="weight" class="col-form-label">Weight</label>
                                                    <input type="text" class="form-control" id="weight" name="weight" value="{{$v->weight }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="temp" class="col-form-label">Temperature</label>
                                                    <input type="text" class="form-control" id="temp" name="temp" value="{{$v->temp }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="bp" class="col-form-label">Blood Pressure</label>
                                                    <input type="text" class="form-control" id="bp" name="bp" value="{{$v->bp }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="hr" class="col-form-label">Heart Rate</label>
                                                    <input type="text" class="form-control" id="hr" name="hr" value="{{$v->hr }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="pr" class="col-form-label">Pulse Rate</label>
                                                    <input type="text" class="form-control" id="pr" name="pr" value="{{$v->pr }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="rr" class="col-form-label">Respiratory Rate</label>
                                                    <input type="text" class="form-control" id="rr" name="rr" value="{{$v->rr }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="waist" class="col-form-label">Waist Circumference</label>
                                                    <input type="text" class="form-control" id="waist" name="waist" value="{{$v->waist }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="muac" class="col-form-label">Mid Upper Arm Circumference</label>
                                                    <input type="text" class="form-control" id="muac" name="muac" value="{{$v->muac }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                    {{-- VITAL SIGNS MODAL --}}
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="vitalsModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="vitalsModal">New Vitals</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/vitalsigns" method="post">
                                        @csrf

                                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="height" class="col-form-label">Height</label>
                                                    <input type="text" class="form-control" id="height" name="height" maxlength="250">
                                                </div>
                                                <div class="col-6">
                                                    <label for="weight" class="col-form-label">Weight</label>
                                                    <input type="text" class="form-control" id="weight" name="weight" maxlength="250">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="temp" class="col-form-label">Temperature</label>
                                                    <input type="text" class="form-control" id="temp" name="temp" maxlength="250">
                                                </div>
                                                <div class="col-6">
                                                    <label for="bp" class="col-form-label">Blood Pressure</label>
                                                    <input type="text" class="form-control" id="bp" name="bp" maxlength="250">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="hr" class="col-form-label">Heart Rate</label>
                                                    <input type="text" class="form-control" id="hr" name="hr" maxlength="250">
                                                </div>
                                                <div class="col-6">
                                                    <label for="pr" class="col-form-label">Pulse Rate</label>
                                                    <input type="text" class="form-control" id="pr" name="pr" maxlength="250">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="rr" class="col-form-label">Respiratory Rate</label>
                                                    <input type="text" class="form-control" id="rr" name="rr" maxlength="250">
                                                </div>
                                                <div class="col-6">
                                                    <label for="waist" class="col-form-label">Waist Circumference</label>
                                                    <input type="text" class="form-control" id="waist" name="waist" maxlength="250">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="muac" class="col-form-label">Mid Upper Arm Circumference</label>
                                                    <input type="text" class="form-control" id="muac" name="muac" maxlength="250">
                                                </div>
                                            </div>
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

<script>
    function getVisit(id){
        //ajax
        $.ajax({
            url: '/vitalsigns/' + id,
            success: function(result){
                console.table(result)
            }
        })
        //show modal
    }
</script>

@stop
