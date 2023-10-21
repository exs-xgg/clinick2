@extends('includes.template')
@section('content')

<div class="container">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

    @endif
        <div class="card border-success">
            <div class="card-header">
                Patient Record #{{$visit->id}} <br> Consult Date: <b>{{Carbon\Carbon::parse($visit->created_at)->toDayDateTimeString()}}</b> - ({{Carbon\Carbon::parse($visit->created_at)->diffForHumans()}})<span class="float-right"></span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#ptInfo" role="button" aria-expanded="false" aria-controls="ptInfo">Patient Information (click to expand)</div>
                            <div class="card-body collapse " id="ptInfo">
                                <table class="table table-sm">
                                    <tr>
                                        <th class="">Name</th><td class=""><a href="/patient/{{$patient->id}}">{{Str::upper($patient->lname . ', ' . $patient->fname . ( $patient->mname ? ' ' . $patient->mname : '') ) }}</a></td>
                                    </tr>
                                    <tr>
                                        <th class="">Birthdate</th><td class="">{{$patient->birthdate ?? ''}} {{ $patient->age ? '(' . $patient->age . ')' : ''}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Gender</th><td class="">{{Str::upper($patient->sex)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Contact Number</th><td class="">{{Str::upper($patient->contact_no)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Civil Status</th><td class="">{{Str::upper($patient->civil_stat)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Occupation</th><td class="">{{Str::upper($patient->occupation)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">HMO</th><td class="">{{Str::upper($patient->hmo)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Address</th><td class="">{{Str::upper($patient->address)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Mother's Name</th><td class="">{{Str::upper($patient->mothers_name)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="">Father's Name</th><td class="">{{Str::upper($patient->fathers_name)}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        @include('patient.vitals')
                    </div>
                </div>

            <form autocomplete="off" action="/visit/{{$visit->id}}" method="post">
                <div class="row mb-3">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$visit->id}}">
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="card bg-success">
                            <div class="card-header text-white" data-toggle="collapse" aria-expanded="true" aria-controls="collapseHx" href="#collapseHx">
                                HX
                            </div>
                            <div class="card-body collapse show multi-collapse" id="collapseHx">
                                <textarea class="form-control col-12" name="history" id="" cols="30" rows="10">{{$visit->history}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="card bg-info">
                            <div class="card-header" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSymptoms" href="#collapseSymptoms">
                                Symptoms/PE
                            </div>
                            <div class="card-body collapse multi-collapse" id="collapseSymptoms">
                                <textarea class="form-control col-12" name="symptoms" id="symptoms" cols="30" rows="10">{{$visit->symptoms}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="card bg-danger">
                            <div class="card-header text-white"  data-toggle="collapse" aria-expanded="false" aria-controls="collapseDx" href="#collapseDx">
                                DX
                            </div>
                            <div class="card-body collapse multi-collapse" id="collapseDx">
                                <textarea class="form-control col-12" name="diagnosis" id="" cols="30" rows="10">{{$visit->diagnosis}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="card border-warning">
                            <div class="card-header bg-warning" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTHA" href="#collapseTHA">
                                Prescriptions/THA
                            </div>
                            <div class="card-body collapse multi-collapse" id="collapseTHA">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        @include('patient.prescription')
                                    </div>
                                </div>
                                {{-- <textarea class="form-control col-12" name="prescription" id="prescription" cols="30" rows="10">{{$visit->prescription}}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    @include('patient.gallery')
                    <button class="float" type="submit">
                        <i class="fa fa-save my-float"></i>
                    </button>
                    <span class="float2" data-toggle="collapse" data-target=".multi-collapse">
                        <i class="fa fa-th-list my-float"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<style>
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:20px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
    border: 0px;
    padding-bottom:20px;
    padding-top: -10px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}.float2{
	position:fixed;
	width:60px;
	height:60px;
	bottom:105px;
	right:20px;
	background-color:rgb(203, 218, 77);
	color:#FFF;
	border-radius:50px;
    border: 0px;
    padding-bottom:20px;
    padding-top: -10px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:15px;
    font-size: 30px
}
</style>

@stop
