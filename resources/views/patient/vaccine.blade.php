<div class="card">

    <div class="card-header text-white bg-danger" data-toggle="collapse" aria-expanded="false" aria-controls="collapseVaccine" href="#collapseVaccine">
        <span><i class="fa fa-shield"> </i> Vaccination Records</span>
    </div>
    <div class="card-body collapse" id="collapseVaccine">
        <ul class="list-group">
            @foreach ($vaccines as $v)
            <li class="list-group-item" data-toggle="collapse" href="#collapseVaccineId{{$v->id}}" role="button" aria-expanded="false" aria-controls="collapseVaccineId{{$v->id}}">{{Carbon\Carbon::parse( $v->created_at)->format("m-d-Y H:i a")}}, {{Carbon\Carbon::parse($v->date_administered ?? $v->created_at)->diffForHumans()}}</li>

            <div class="collapse" id="collapseVaccineId{{$v->id}}">
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

            <li class="list-group-item" ><button class="btn btn-info text-white"  data-toggle="modal" data-target=".vaccine-modal"><i class="fa fa-clipboard"></i> View Vaccine Records</button></li>
        </ul>
    </div>
</div>

                    {{-- Vaccine MODAL --}}
<div class="modal fade bd-example-modal-lg vaccine-modal" tabindex="-1" role="dialog" aria-labelledby="vaccine-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vaccineModal">Add New Vaccine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vaccine</th><th>1st Dose</th><th>2nd Dose</th><th>3rd Dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BCG</td>
                            <td>AUG-31-2022</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
