
<div id="parent" class="form-group">
    <label for="prescriptionAutocomplete">Search Prescriptions</label>
    <input rows="1" type="text" id="prescriptionAutocomplete" class="form-control mb-3" onkeydown="return event.key != 'Enter';">
</div>
<textarea class="form-control" name="prescription" id="prescription" cols="30" rows="10">{{$visit->prescription}}</textarea>
@push('scripts')
<script>
 var src = {
    @foreach ($drugs as $drug)

        "{{$drug->drug_name}}": 1,
    @endforeach
}

function onSelectItem(item, element) {

    const message = document.getElementById('prescription');
    if(message.value){
        message.value += '\r\n' + item.label ;
    }else{
        message.value += item.label + '\r\n' ;
    }

}
$('#prescriptionAutocomplete').autocomplete({
  source: src,
  onSelectItem: onSelectItem,
  highlightClass: 'text-danger',
  treshold: 3,
});

</script>
@endpush
