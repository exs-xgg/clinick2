<div class="card">

    <div class="card-header text-white bg-danger" data-toggle="collapse" aria-expanded="false" aria-controls="collapseVaccine" href="#collapseVaccine">
        <span><i class="fa fa-shield"> </i> Vaccination Records</span>
    </div>
    <div class="card-body collapse" id="collapseVaccine">
        <ul class="list-group">
            <li class="list-group-item" ><button class="btn btn-info text-white"  data-toggle="modal" data-target=".vaccine-modal"><i class="fa fa-clipboard"></i> View Vaccine Records</button><button class="btn btn-success text-white ml-3"  data-toggle="modal" data-target=".new-vaccine-modal"><i class="fa fa-plus"></i> Add New Vaccine Record</button></li>
        </ul>
    </div>
</div>

                    {{-- Vaccine FORM MODAL --}}
<div class="modal fade bd-example-modal-lg vaccine-modal" tabindex="-1" role="dialog" aria-labelledby="vaccine-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vaccineModal">{{$patient->fname}}'s Vaccine Record</h5>
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
                            <td>ROTA</td>
                            <td>@isset($vaccines['ROTA1']){{ $vaccines['ROTA1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA2']){{ $vaccines['ROTA2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA3']){{ $vaccines['ROTA3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA4']){{ $vaccines['ROTA4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA5']){{ $vaccines['ROTA5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>BCG</td>
                            <td>@isset($vaccines['BCG1']){{ $vaccines['BCG1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG2']){{ $vaccines['BCG2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG3']){{ $vaccines['BCG3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG4']){{ $vaccines['BCG4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG5']){{ $vaccines['BCG5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>HEPA</td>
                            <td>@isset($vaccines['HEPA1']){{ $vaccines['HEPA1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPA2']){{ $vaccines['HEPA2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPA3']){{ $vaccines['HEPA3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPA4']){{ $vaccines['HEPA4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPA5']){{ $vaccines['HEPA5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success text-white ml-3"  data-toggle="modal" data-target=".new-vaccine-modal"><i class="fa fa-plus"></i> Add New Vaccine Record</button><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- NEW Vaccine MODAL --}}
<div class="modal fade bd-example-modal-lg new-vaccine-modal" tabindex="-1" role="dialog" aria-labelledby="new-vaccine-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newVaccineModal">Add New Vaccine Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/vaccine" method="post">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vaccine</th><th>Date of Administration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="vaccine_id" id="vaccine_id">
                                    @foreach ($lib_vaccines as $lib_vaccine)

                                    <option value="{{$lib_vaccine->vax_name}}">{{$lib_vaccine->vax_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="date" name="date_administered" id="date_administered"></td>
                        </tr>
                    </tbody>
                </table>
                <i> Vaccine not available on the list? It may have been administered already.</i>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
