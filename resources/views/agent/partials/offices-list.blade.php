<div class="row">
    <div class="col-md-12">
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active">
                @if(empty($offices))
                    <h5>
                        ERROR, there are no offices.
                    </h5>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offices as $office)
                            <tr>
                                <td>{{$office->id}}</td>
                                <td>{{$office->name}}</td>
                                <td>{{$office->address}}</td>
                                <td>{{$office->phone}}</td>
                                <td>
                                    <a href="{{ route('edit_office', [$office->id])}}" class="btn btn-primary">Edit</a>
                                    @if($office->is_active === 1)
                                        <a href="{{ route('disable_office', [$office->id])}}" class="btn btn-danger"
                                        onclick="return confirm(`Are you sure you want to disable '{{$office->name}}' ?`)">Disable</a>
                                    @else
                                        <a href="{{ route('activate_office', [$office->id])}}" class="btn btn-success"
                                           onclick="return confirm(`Are you sure you want to activate '{{$office->name}}' ?`)">Activate</a>
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
