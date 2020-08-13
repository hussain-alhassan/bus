<div class="row">
    <div class="col-md-12">
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active">
                @if(empty($agencies))
                    <h5>
                        ERROR, there are no agencies.
                    </h5>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name EN</th>
                            <th scope="col">Hot Line</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agencies as $agency)
                            <tr>
                                <td>{{$agency->id}}</td>
                                <td>{{$agency->name}}</td>
                                <td>{{$agency->name_en}}</td>
                                <td>{{ $agency->hotline}}</td>
                                <td>
                                    <a href="/admin/agency/{{$agency->id}}/edit/" class="btn btn-primary">Edit</a>
                                    @if($agency->is_active === 1)
                                        <a href="/admin/agency/{{$agency->id}}/disable" class="btn btn-danger"
                                        onclick="return confirm(`Are you sure you want to disable '{{$agency->name}}' ?`)">Disable</a>
                                    @else
                                        <a href="/admin/agency/{{$agency->id}}/activate" class="btn btn-success"
                                           onclick="return confirm(`Are you sure you want to activate '{{$agency->name}}' ?`)">Activate</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
