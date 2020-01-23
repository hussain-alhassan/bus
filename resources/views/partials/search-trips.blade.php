<div class="card">
    <div class="card-header">Find Trips</div>
    <div class="card-body">
        <form method="GET" action="/search">
            <div class="container">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">From</label>
                        <input type="text" class="form-control @error('from') is-invalid @enderror"
                               name="from" value="{{ old('from') }}" required autocomplete="from" autofocus>

                        @error('from')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">To</label>
                        <input type="text" class="form-control @error('to') is-invalid @enderror"
                               name="to" value="{{ old('to') }}" required autocomplete="to">

                        @error('to')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Depart</label>

                        <input type="text" class="form-control @error('depart') is-invalid @enderror"
                               name="depart" value="{{ old('depart') }}" required autocomplete="depart">

                        @error('depart')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Return</label>
                        <input type="text" class="form-control @error('return') is-invalid @enderror"
                               name="return" value="{{ old('return') }}" required autocomplete="return">

                        @error('depart')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label text-md-right">Seats</label>
                        <select class="browser-default custom-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="3">4</option>
                            <option value="3">5</option>
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
