<div class="row">
    <div class="col-md-12">
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active">
                @if(empty($cities))
                    <h5>
                        ERROR, there are no cities.
                    </h5>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name EN</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td>{{$city->name}}</td>
                                <td>{{$city->name_en}}</td>
                                <td>
                                    <a href="/admin/city/{{$city->id}}/edit/" class="btn btn-primary">Edit</a>
                                    @if($city->is_active === 1)
                                        <a href="/admin/city/{{$city->id}}/disable" class="btn btn-danger"
                                        onclick="return confirm(`Are you sure you want to disable '{{$city->name}}' ?`)">Disable</a>
                                    @else
                                        <a href="/admin/city/{{$city->id}}/activate" class="btn btn-success"
                                           onclick="return confirm(`Are you sure you want to activate '{{$city->name}}' ?`)">Activate</a>
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
