
<div class="col-12 mb-2">
    <div class="card border-info">
        <div class="card-header text-white bg-info" data-toggle="collapse" aria-expanded="false" aria-controls="collapsePhotos" href="#collapsePhotos">Photos</div>
        <div class="card-body collapse multi-collapse" id="collapsePhotos">
            <div class="form-group">
                <div class="row mb-3">

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
                        <div class="card-header">{{Carbon\Carbon::parse($i->created_at)->toDayDateTimeString()}}</div>
                        <div class="card-body">
                            <a target="blank" href="{{$i->asset_path}}"><img class="img-visit" src="" alt="{{$i->created_at}}" style=" max-width: 100%;  max-heigh: 30vh; "></a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
  (function() {


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
        // $("#uploadManual").hide();

        $("#uploadManual").html('Uploading...');
        $("#uploadManual").prop('disabled', 'true')

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
                if(response.status == 500 || (!response)){
                    alert('Uploading failed, please check internet connection');
                    $("#uploadManual").html('Upload');
                    $("#uploadManual").prop('disabled', '')
                    return 0;
                }
                $("#fileUpload").val('');
                location.reload();
            }).catch(err => {
                alert('Uploading failed, please check internet connection');
                    $("#uploadManual").html('Upload');
                    $("#uploadManual").prop('disabled', '')
            });
      }
    document.getElementById('uploadManual').addEventListener('click', saveImage, false);
    })();



</script>

@endpush
