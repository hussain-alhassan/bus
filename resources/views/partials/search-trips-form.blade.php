
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">

    <div class="card-header">Find Trips</div>
    <div class="card-body">
        <form method="GET" action="/trips/search">

            <div class="container">
                <div class="form-group row">
                    <div class="mr-3 flex-fill">
                        <label class="col-form-label text-md-right">From</label>
                        <select class="form-control" name="from">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" {{$city->id === intval(old('from')) ? 'selected' : ''}}>
                                    {{$city->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mr-3 flex-fill">
                        <label class="col-form-label text-md-right">To</label>
                        <select class="form-control" name="to">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" {{$city->id === intval(old('to')) ? 'selected' : ''}}>
                                    {{$city->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mr-3 flex-fill">
                        <label class="col-form-label text-md-right">Depart</label>

                        <input type="date" class="form-control @error('depart') is-invalid @enderror"
                               name="depart" value="{{ old('depart') ?? Request::get('depart') }}" required autocomplete="depart">
                    </div>

                    <div class="mr-3 flex-fill">
                        <label class="col-form-label text-md-right">Return</label>
                        <input type="date" class="form-control @error('return') is-invalid @enderror"
                               name="return" value="{{ Request::get('return') }}" autocomplete="return">
                    </div>

                    <div class="mr-3 flex-fill">
                        <label class="col-form-label text-md-right">Seats</label>
                        <select name="seats" class="browser-default custom-select @error('seats') is-invalid @enderror">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}" {{ Request::get('seats') == $i ? 'selected' : ''}}>{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mt-auto flex-fill">
                        <div>
                            <button type="submit" class="btn btn-primary">Find Trips</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
