<form method="POST" action="/agent/office/{{$office->id}}/update">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') ?? $office->name }}" required autocomplete="name" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

        <div class="col-md-6">
            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone') ?? $office->phone }}" required autocomplete="phone" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

        <div class="col-md-6">
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" required
                      rows="4">{{ old('address') ?? $office->address }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="location_link" class="col-md-4 col-form-label text-md-right">Location Link</label>

        <div class="col-md-6">
            <textarea name="location_link" class="form-control @error('location_link') is-invalid @enderror" required
                      rows="7">{{ old('location_link') ?? $office->location_link }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="hours" class="col-md-4 col-form-label text-md-right">Working Hours</label>

        <div class="col-md-6">
            <textarea name="hours" class="form-control @error('hours') is-invalid @enderror" required
                      rows="7">{{ old('hours') ?? $office->hours }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input name="is_active" class="form-check-input" type="checkbox"
                    {{ (old('is_active') || $office->is_active) ? 'checked' : ''}}>

                <label class="form-check-label" for="is_active">Active Office</label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
