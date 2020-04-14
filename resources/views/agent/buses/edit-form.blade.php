<form method="POST" action="{{route('buses.update', [$bus->id])}}" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="bus_number" class="col-md-4 col-form-label text-md-right">Bus Number</label>

        <div class="col-md-6">
            <input name="bus_number" type="text" class="form-control @error('bus_number') is-invalid @enderror"
                   value="{{ old('bus_number') ?? $bus->bus_number }}" required autocomplete="on" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="licence_plate" class="col-md-4 col-form-label text-md-right">Licence Plate</label>

        <div class="col-md-6">
            <input name="licence_plate" type="text" class="form-control @error('licence_plate') is-invalid @enderror"
                   value="{{ old('licence_plate') ?? $bus->licence_plate }}" required autocomplete="on" >
        </div>
    </div>

    <div class="form-group row">
        <label for="registration" class="col-md-4 col-form-label text-md-right">Registration</label>

        <div class="col-md-6">
            <input name="registration" type="text" class="form-control @error('registration') is-invalid @enderror"
                   value="{{ old('registration') ?? $bus->registration}}" required autocomplete="on">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
