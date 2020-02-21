<div class="card">
    <div class="card-header">Find Trips</div>
    <div class="card-body">

        {{-- show validation errors if there is any --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="GET" action="/trips/search" novalidate>
            <div class="container">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">From</label>
                        <input type="text" class="form-control @error('from') is-invalid @enderror"
                               name="from" value="{{ old('from') ?? Request::get('from') }}" required autocomplete="from" autofocus>

                        @error('from')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">To</label>
                        <input type="text" class="form-control @error('to') is-invalid @enderror"
                               name="to" value="{{ old('to') ?? Request::get('to') }}" required autocomplete="to">

                        @error('to')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Depart</label>

                        <input type="date" class="form-control @error('depart') is-invalid @enderror"
                               name="depart" value="{{ old('depart') ?? Request::get('depart') }}" required autocomplete="depart">
                        @error('depart')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Return</label>
                        <input type="date" class="form-control @error('return') is-invalid @enderror"
                               name="return" value="{{ Request::get('return') }}" required autocomplete="return">

                        @error('depart')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Seats</label>
                        <select name="seats" class="browser-default custom-select">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}" {{ Request::get('seats') == $i ? 'selected' : ''}}>{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-2 mt-auto">
                        <div>
                            <button type="submit" class="btn btn-primary">Find Trips</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
