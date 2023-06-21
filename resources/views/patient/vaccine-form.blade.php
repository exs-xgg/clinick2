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
                            <th>Vaccine</th><th>1st Dose</th><th>2nd Dose</th><th>3rd Dose</th><th>4th Dose</th><th>5th Dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BCG</td>
                            <td>@isset($vaccines['BCG1']){{ $vaccines['BCG1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG2']){{ $vaccines['BCG2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG3']){{ $vaccines['BCG3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG4']){{ $vaccines['BCG4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['BCG5']){{ $vaccines['BCG5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>HEPATITIS B</td>
                            <td>@isset($vaccines['HEPAB1']){{ $vaccines['HEPAB1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAB2']){{ $vaccines['HEPAB2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAB3']){{ $vaccines['HEPAB3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAB4']){{ $vaccines['HEPAB4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAB5']){{ $vaccines['HEPAB5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>ROTAVIRUS</td>
                            <td>@isset($vaccines['ROTA1']){{ $vaccines['ROTA1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA2']){{ $vaccines['ROTA2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA3']){{ $vaccines['ROTA3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA4']){{ $vaccines['ROTA4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['ROTA5']){{ $vaccines['ROTA5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>DPT, IPV, HIB</td>
                            <td>@isset($vaccines['DPT1']){{ $vaccines['DPT1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DPT2']){{ $vaccines['DPT2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DPT3']){{ $vaccines['DPT3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DPT4']){{ $vaccines['DPT4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DPT5']){{ $vaccines['DPT5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>PCV</td>
                            <td>@isset($vaccines['PCV1']){{ $vaccines['PCV1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PCV2']){{ $vaccines['PCV2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PCV3']){{ $vaccines['PCV3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PCV4']){{ $vaccines['PCV4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PCV5']){{ $vaccines['PCV5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>MEASLES</td>
                            <td>@isset($vaccines['MEA1']){{ $vaccines['MEA1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEA2']){{ $vaccines['MEA2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEA3']){{ $vaccines['MEA3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEA4']){{ $vaccines['MEA4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEA5']){{ $vaccines['MEA5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>VARICELLA</td>
                            <td>@isset($vaccines['VAR1']){{ $vaccines['VAR1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['VAR2']){{ $vaccines['VAR2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['VAR3']){{ $vaccines['VAR3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['VAR4']){{ $vaccines['VAR4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['VAR5']){{ $vaccines['VAR5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>MMR</td>
                            <td>@isset($vaccines['MMR1']){{ $vaccines['MMR1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MMR2']){{ $vaccines['MMR2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MMR3']){{ $vaccines['MMR3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MMR4']){{ $vaccines['MMR4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MMR5']){{ $vaccines['MMR5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>INFLUENZA</td>
                            <td>@isset($vaccines['INF1']){{ $vaccines['INF1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['INF2']){{ $vaccines['INF2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['INF3']){{ $vaccines['INF3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['INF4']){{ $vaccines['INF4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['INF5']){{ $vaccines['INF5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>PPV</td>
                            <td>@isset($vaccines['PPV1']){{ $vaccines['PPV1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PPV2']){{ $vaccines['PPV2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PPV3']){{ $vaccines['PPV3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PPV4']){{ $vaccines['PPV4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['PPV5']){{ $vaccines['PPV5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>HEPATITIS A</td>
                            <td>@isset($vaccines['HEPAA1']){{ $vaccines['HEPAA1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAA2']){{ $vaccines['HEPAA2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAA3']){{ $vaccines['HEPAA3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAA4']){{ $vaccines['HEPAA4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HEPAA5']){{ $vaccines['HEPAA5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>TYPHOID</td>
                            <td>@isset($vaccines['TYP1']){{ $vaccines['TYP1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TYP2']){{ $vaccines['TYP2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TYP3']){{ $vaccines['TYP3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TYP4']){{ $vaccines['TYP4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TYP5']){{ $vaccines['TYP5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>MENINGOCOCCAL</td>
                            <td>@isset($vaccines['MEN1']){{ $vaccines['MEN1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEN2']){{ $vaccines['MEN2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEN3']){{ $vaccines['MEN3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEN4']){{ $vaccines['MEN4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['MEN5']){{ $vaccines['MEN5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>JAP ENCEPH</td>
                            <td>@isset($vaccines['JAP1']){{ $vaccines['JAP1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['JAP2']){{ $vaccines['JAP2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['JAP3']){{ $vaccines['JAP3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['JAP4']){{ $vaccines['JAP4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['JAP5']){{ $vaccines['JAP5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>RABIES</td>
                            <td>@isset($vaccines['RAB1']){{ $vaccines['RAB1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['RAB2']){{ $vaccines['RAB2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['RAB3']){{ $vaccines['RAB3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['RAB4']){{ $vaccines['RAB4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['RAB5']){{ $vaccines['RAB5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>HPV</td>
                            <td>@isset($vaccines['HPV1']){{ $vaccines['HPV1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HPV2']){{ $vaccines['HPV2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HPV3']){{ $vaccines['HPV3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HPV4']){{ $vaccines['HPV4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['HPV5']){{ $vaccines['HPV5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>TDAP</td>
                            <td>@isset($vaccines['TDAP1']){{ $vaccines['TDAP1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TDAP2']){{ $vaccines['TDAP2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TDAP3']){{ $vaccines['TDAP3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TDAP4']){{ $vaccines['TDAP4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['TDAP5']){{ $vaccines['TDAP5']['date_administered'] }} @else {{ "-" }} @endisset</td>
                        </tr>
                        <tr>
                            <td>DENGUE</td>
                            <td>@isset($vaccines['DEN1']){{ $vaccines['DEN1']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DEN2']){{ $vaccines['DEN2']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DEN3']){{ $vaccines['DEN3']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DEN4']){{ $vaccines['DEN4']['date_administered'] }} @else {{ "-" }} @endisset</td>
                            <td>@isset($vaccines['DEN5']){{ $vaccines['DEN5']['date_administered'] }} @else {{ "-" }} @endisset</td>
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
