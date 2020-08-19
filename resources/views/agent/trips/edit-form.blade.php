<form method="POST" action="{{route('trips.update', $trip->id)}}" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="trip_number" class="col-md-4 col-form-label text-md-right">Trip Number</label>
        <div class="col-md-6">
            <input name="trip_number" type="text" class="form-control @error('trip_number') is-invalid @enderror"
                   value="{{ old('trip_number') ?? $trip->trip_number }}" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">From</label>
        <div class="col-md-6">
            <select class="form-control" name="from">
                @foreach($cities as $city)
                    <option value="{{$city->id}}"
                        {{ (old('from') == $city->id ||  $trip->from_city_id == $city->id) ? 'selected' : ''}}>
                        {{$city->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">To</label>
        <div class="col-md-6">
            <select class="form-control" name="to">
                @foreach($cities as $city)
                    <option value="{{$city->id}}"
                        {{ (old('to') == $city->id || $trip->from_to_id == $city->id) ? 'selected' : ''}}>
                        {{$city->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Depart</label>
        <div class="col-md-6">
            <input type="datetime-local" class="form-control @error('depart') is-invalid @enderror" name="depart"
                   value="{{ old('depart') ?? $trip->getDateTimeLocal() }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
        <div class="col-md-6">
            <input id="duration" name="duration" type="number" value="{{ old('duration') ?? $trip->duration}}"
                   class="form-control @error('duration') is-invalid @enderror" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="available_seats" class="col-md-4 col-form-label text-md-right">Available Seats</label>
        <div class="col-md-6">
            <input id="available_seats" name="available_seats" type="number"
                   value="{{ old('available_seats') ?? $trip->available_seats}}"
                   class="form-control @error('available_seats') is-invalid @enderror" required>
        </div>
    </div>

    @include('common.yes-no-radio', ['label' => 'Bathroom', 'trip' => $trip , 'field' => 'is_bathroom'])
    @include('common.yes-no-radio', ['label' => 'WIFI', 'trip' => $trip , 'field' => 'is_wifi'])
    @include('common.yes-no-radio', ['label' => 'Meal', 'trip' => $trip , 'field' => 'is_meal'])
    @include('common.yes-no-radio', ['label' => 'Refreshment', 'trip' => $trip , 'field' => 'is_refreshment'])

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
