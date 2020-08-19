<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">{{$label}}</label>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="{{$field}}" id="{{$field . '_no'}}" value="0"
            {{(old($field) === '0' || @$trip->$field === 0) ? 'checked' : ''}}>
        <label class="form-check-label" for="{{$field . '_no'}}">No</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="{{$field}}" id="{{$field . '_yes'}}" value="1"
            {{(old($field) || @$trip->$field) ? 'checked' : ''}}>
        <label class="form-check-label" for="{{$field . '_yes'}}">Yes</label>
    </div>
</div>
