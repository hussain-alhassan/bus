<form method="POST" action="/agent/profile/{{$agency->id}}/update" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Agent Name</label>

        <div class="col-md-6">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') ?? $agency->name }}" required autocomplete="name" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="name_en" class="col-md-4 col-form-label text-md-right">Agent Name (English)</label>

        <div class="col-md-6">
            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                   value="{{ old('name_en') ?? $agency->name_en }}" required autocomplete="name_en" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

        <div class="col-md-6">
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" required
            rows="4" cols="50">{{ old('description') ?? $agency->description }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="hotline" class="col-md-4 col-form-label text-md-right">Hot Line</label>

        <div class="col-md-6">
            <input type="text" class="form-control @error('hotline') is-invalid @enderror" name="hotline"
                   value="{{ old('hotline') ?? $agency->hotline }}" autocomplete="hotline" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="hotline" class="col-md-4 col-form-label text-md-right">Logo</label>

        <div class="col-md-6">
            <img src="{{asset("/storage/images/logos/$agency->logo")}}" alt="Agency logo" height="200" width="280">
        </div>
    </div>

    <div class="form-group row">
        <label for="hotline" class="col-md-4 col-form-label text-md-right">Logo</label>

        <div class="col-md-6">
            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo"
                   onchange="validateLogo()" autofocus accept="image/*">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
