<form method="POST" action="/agent/office/main-branch" novalidate>
    @csrf

    <div class="container mt-5">

        <div class="form-group row">
            <label class="col-form-label text-md-right">Main Branch</label>
            <div class="col-md-6">
                <select class="form-control" name="office_id">
                    @foreach($offices as $office)
                        <option value="{{$office->id}}" {{ ($office->is_main_branch === 1) ? 'selected' : ''}}>
                            {{$office->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Set</button>
            </div>
        </div>

    </div>
</form>
