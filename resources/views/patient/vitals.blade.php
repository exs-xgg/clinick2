<div class="card">

    <div class="card-header text-white bg-secondary" data-toggle="collapse" aria-expanded="false" aria-controls="collapseVitals" href="#collapseVitals">
        <span><i class="fa fa-stethoscope"></i> Vitals</span>
    </div>
    <div class="card-body collapse" id="collapseVitals">
        <ul class="list-group">
            @foreach ($vitals as $v)
            <li class="list-group-item" data-toggle="collapse" href="#collapseVitalsId{{$v->id}}" role="button" aria-expanded="false" aria-controls="collapseVitalsId{{$v->id}}">{{Carbon\Carbon::parse( $v->created_at)->format("m-d-Y H:i a")}}, {{Carbon\Carbon::parse($v->alias_created_at ?? $v->created_at)->diffForHumans()}}</li>

            <div class="collapse" id="collapseVitalsId{{$v->id}}">
                <form autocomplete="off" action="/vitalsigns/{{$v->id}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="patient_id" value="{{$v->patient_id}}">
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

                            <div class="col-6">
                                <label for="save" class="row col-form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-success float-right" id="save"><i class="fa fa-save"></i></button>
                                {{-- <a class="btn btn-danger float-right mx-2" id="delete"><i class="fa fa-trash"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            @endforeach

            <li class="list-group-item" ><button class="btn btn-info text-white"  data-toggle="modal" data-target=".vitals-modal"><i class="fa fa-plus"></i> Record New Vital Signs</button></li>
        </ul>
    </div>
</div>

                    {{-- VITAL SIGNS MODAL --}}
<div class="modal fade bd-example-modal-lg vitals-modal" tabindex="-1" role="dialog" aria-labelledby="vitals-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vitalsModal">New Vitals</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="/vitalsigns" method="post">
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
