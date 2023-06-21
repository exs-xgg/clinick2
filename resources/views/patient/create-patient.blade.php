@extends('includes.template')
@section('content')

<div class="container">

    @isset ($patient)
        <div class="alert alert-success">Patient Saved. <a href="/patient/{{$patient->id}}">View Saved Patient</a> </div>
    @endisset
    <div class="card">
        <div class="card-header">
            Create New Patient
        </div>
        <div class="card-body ">
        <form action="/patient" method="post" autocomplete="off" autocapitalize="on">
            <div class="form-group row">
                @csrf
                <div class="row col-12">
                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="lname" id="lname" required>
                </div>

                <div class="row col-12">
                    <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="fname" id="fname" required>
                </div>

                <div class="row col-12">
                    <label for="mname" class="col-sm-2 col-form-label">Middle Name</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="mname" id="mname">
                </div>

                <div class="row col-12">
                    <label for="birthdate" class="col-sm-2 col-form-label">Birthdate</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="birthdate" id="birthdate" placeholder="mm/dd/yyyy">
                </div>
{{--
                <div class="row col-12">
                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="age" id="age">
                </div> --}}


                <div class="row col-12">
                    <label for="sex" class="col-sm-2 col-form-label">Gender</label>
                    <select name="sex" id="sex" class=" col-sm-4 mb-3" required>
                        <option value="na" selected>NA</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>


                <div class="row col-12">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="address" id="address">
                </div>

                <div class="row col-12">
                    <label for="contact_no" class="col-sm-2 col-form-label">Patient's Contact Number</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="contact_no" id="contact_no">
                </div>

                <div class="row col-12">
                    <label for="mothers_name" class="col-sm-2 col-form-label">Mother's Name</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="mothers_name" id="mothers_name">
                </div>


                <div class="row col-12">
                    <label for="fatherrs_name" class="col-sm-2 col-form-label">Father's Name</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="fatherrs_name" id="fatherrs_name">
                </div>

                <div class="row col-12">
                    <label for="emergency_contact_no" class="col-sm-2 col-form-label">Emergency Contact Number</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="emergency_contact_no" id="emergency_contact_no">
                </div>

                <div class="row col-12">
                    <label for="civil_stat" class="col-sm-2 col-form-label">Civil Status</label>
                    <select name="civil_stat" id="civil_stat" class=" col-sm-4 mb-3">
                        <option value="S" selected>Single</option>
                        <option value="M">Married</option>
                        <option value="C">Child</option>
                        <option value="W">Widow/er</option>
                    </select>
                </div>

                <div class="row col-12">
                    <label for="occupation" class="col-sm-2 col-form-label">Occupation</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="occupation" id="occupation">
                </div>

                <div class="row col-12">
                    <label for="hmo" class="col-sm-2 col-form-label">HMO</label>
                    <input class="form-control col-sm-10 mb-3" type="text" name="hmo" id="hmo">
                </div>

                <div class="row col-12">
                    <button type="submit" class="btn btn-success mx-auto">Create Patient</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@stop
