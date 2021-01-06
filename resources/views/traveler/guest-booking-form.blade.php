<form method="GET"
      action="{{route('trips.book')}}">

    <input type="hidden" name="depart_trip" value="{{Request::get('depart_trip')}}">
    <input type="hidden" name="seats" value="{{$searchInputs['seats']}}">

    <div class="form-group row">
        <label for="guest_name" class="col-md-4 col-form-label text-md-right">Guest Name</label>
        <div class="col-md-6">
            <input name="guest_name" type="text" class="form-control @error('guest_name') is-invalid @enderror"
                   value="{{ old('guest_name') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="guest_phone" class="col-md-4 col-form-label text-md-right">Guest Phone</label>
        <div class="col-md-6">
            <input name="guest_phone" type="text" value="{{ old('guest_phone') }}"
                   class="form-control @error('guest_phone') is-invalid @enderror" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <input type="submit" class="btn btn-success float-right" value="Book">
        </div>
    </div>
</form>
