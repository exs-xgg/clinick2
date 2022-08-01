@extends('includes.template')
@section('content')

<div class="container">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

    @endif
    <form action="/visit/{{$visit->id}}" method="post">
        <div class="card border-success">
            <div class="card-header">
                Patient Record #{{$visit->id}} <span class="float-right"><button class="btn btn-success btn-sm" type="submit">Update Record</button></span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#ptInfo" role="button" aria-expanded="false" aria-controls="ptInfo">Patient Information (click to expand)<span class="float-right"><a href="/patient/{{$patient->id}}">View Whole Profile</a></span></div>
                            <div class="card-body collapse " id="ptInfo">
                                <table class="table table-sm">
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
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">
                        <div class="card">
                            <div class="card-header">Vitals <span class="float-right"><button class="btn btn-success btn-sm">Add Vitals</button></span></div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Date/Time</th><th>Temp</th><th>WT</th><th>BP</th><th>RR</th><th>HR</th><th></th>
                                    </tr>
                                    <tr>
                                        <td>{{Carbon\Carbon::now()->format('m-d-Y H:i a')}}</td>
                                        <td>35.2 &#176;C</td>
                                        <td>56 kg</td>
                                        <td>130/110</td>
                                        <td>18</td>
                                        <td>80</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$visit->id}}">
                    <div class="col-md-6 col-sm-12 mb-2">
                        <div class="card bg-success">
                            <div class="card-header text-white">
                                HX
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="history" id="" cols="30" rows="10">{{$visit->history}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-2">
                        <div class="card bg-info">
                            <div class="card-header">
                                Symptoms
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="symptoms" id="symptoms" cols="30" rows="10">{{$visit->symptoms}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-2">
                        <div class="card bg-danger ">
                            <div class="card-header text-white">
                                DX
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="diagnosis" id="" cols="30" rows="10">{{$visit->diagnosis}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-2">
                        <div class="card bg-warning">
                            <div class="card-header">
                                Prescriptions/THA
                            </div>
                            <div class="card-body">
                                <textarea class="form-control col-12" name="prescription" id="prescription" cols="30" rows="10">{{$visit->prescription}}</textarea>
                            </div>
                        </div>
                    </div>

    </form>
                    <div class="col-12 mb-2">
                        <div class="card border-info">
                            <div class="card-header text-white bg-info">Photos</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row mb-3">

                                        <div class="d-none">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" id="camTrigger"><i class="fa fa-camera"></i> Open Camera</button>
                                        </div>

                                        <div class="col-6">

                                            <input type='file' id='fileUpload' name='fileUpload' accept=".jpg,.png,.pdf">
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-sm btn-success" id="uploadManual"><i class="fa fa-upload"></i> Upload</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($images as $i)
                                        <div class="card col-md-5 col-sm-12 m-4">
                                            <div class="card-header">{{$i->created_at}}</div>
                                            <div class="card-body">
                                                <a target="blank" href="{{$i->asset_path}}"><img class="img-visit" src="{{$i->asset_path}}" alt="{{$i->created_at}}" style=" max-width: 100%;  max-heigh: 30vh; "></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content container">
                                                <div class="row">
                                                    <div class="col-6 mx-auto">
                                                        <video id="video">Video stream not available.</video>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-2 mx-auto">
                                                        <button type="button" id="startbutton" class="btn btn-success" >Take photo</button>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 mx-auto ">
                                                        <canvas class="d-none" id="canvas">
                                                        </canvas>
                                                        <div class="output">
                                                            <img id="photo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-6">
                                                        <button class="btn btn-success col-12" id="saveImage" type="button" data-dismiss="modal">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
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
  (function() {

      var width = 770;    // We will scale the photo width to this
      var height = 900;   // This will be computed based on the input stre
      var streaming = false;

      var video = null;
      var canvas = null;
      var photo = null;
      var startbutton = null;

      function startup() {
        video = document.getElementById('video');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');

        navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function(stream) {
          video.srcObject = stream;
          video.play();
        })
        .catch(function(err) {
          console.log("An error occurred: " + err);
        });

        video.addEventListener('canplay', function(ev){
          if (!streaming) {
            height = video.videoHeight / (video.videoWidth/width);

            // Firefox currently has a bug where the height can't be read from
            // the video, so we will make assumptions if this happens.

            if (isNaN(height)) {
              height = width / (4/3);
            }

            video.setAttribute('width', 340);
            video.setAttribute('height', 300);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
          }
        }, false);

        startbutton.addEventListener('click', function(ev){
          takepicture();
          ev.preventDefault();
        }, false);

        clearphoto();
      }


      function clearphoto() {
        var context = canvas.getContext('2d');
        context.fillStyle = "#AAA";
        context.fillRect(0, 0, canvas.width, canvas.height);

        var data = canvas.toDataURL('image/png');
        photo.setAttribute('src', data);
      }

      function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
          canvas.width = width;
          canvas.height = height;
          context.drawImage(video, 0, 0, width, height);

          var data = canvas.toDataURL('image/ ');
          photo.setAttribute('src', data);

        } else {
          clearphoto();
        }
      }

      function saveImage(){
        var fd = new FormData();
        if($("#fileUpload").val()){
            var data = $("#fileUpload")[0].files[0];
            fd.append('asset_path', data, 'file.jpg');
            fd.append('is_import', 'true');
        }else{

            var data = canvas.toDataURL('image/ ');
            fd.append('asset_path', data);
        }
        fd.append('patient_id', {{$patient->id}});
        console.log(fd);
        $("#uploadManual").hide();
        fetch('/image', {
                method:"POST",
                headers:{
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                },
                credentials: "same-origin",
                body:fd
            }).then((response) => {
                $("#fileUpload").val('');
                location.reload();
            })
                // .then(response => console.log(response.text()))
      }

      // Set up our event listener to run the startup process
      // once loading is complete.
      document.getElementById('camTrigger').addEventListener('click', startup, false);
      document.getElementById('saveImage').addEventListener('click', saveImage, false);
      document.getElementById('uploadManual').addEventListener('click', saveImage, false);
    })();



</script>
@stop
