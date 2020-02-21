<form method="POST" action="/admin/city/{{$city->id}}/update">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') ?? $city->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name_en" class="col-md-4 col-form-label text-md-right">Name EN</label>

        <div class="col-md-6">
            <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                   value="{{ old('name_en') ?? $city->name_en }}" required autocomplete="name_en" autofocus>

            @error('name_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_active"
                    {{ (old('is_active') || $city->is_active) ? 'checked' : ''}}>

                <label class="form-check-label" for="is_active">
                    Active City
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </div>
</form>
