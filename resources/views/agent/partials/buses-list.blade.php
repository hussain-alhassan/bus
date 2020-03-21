<div class="row">
    <div class="col-md-12">
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active">
                @if(empty($buses))
                    <h5>
                        ERROR, there are no buses.
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
                        @foreach($buses as $buse)
                            <tr>
                                <td>{{$buse->id}}</td>
                                <td>{{$buse->name}}</td>
                                <td>{{$buse->address}}</td>
                                <td>{{$buse->phone}}</td>
                                <td>
                                    <a href="{{ route('edit_buse', [$buse->id])}}" class="btn btn-primary">Edit</a>
                                    @if($buse->is_active === 1)
                                        <a href="{{ route('disable_buse', [$buse->id])}}" class="btn btn-danger"
                                        onclick="return confirm(`Are you sure you want to disable '{{$buse->name}}' ?`)">Disable</a>
                                    @else
                                        <a href="{{ route('activate_buse', [$buse->id])}}" class="btn btn-success"
                                           onclick="return confirm(`Are you sure you want to activate '{{$buse->name}}' ?`)">Activate</a>
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
