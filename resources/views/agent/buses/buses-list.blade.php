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
                            <th scope="col">Number</th>
                            <th scope="col">licence Plate</th>
                            <th scope="col">Registration</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buses as $bus)
                            <tr>
                                <td>{{$bus->id}}</td>
                                <td>{{$bus->bus_number}}</td>
                                <td>{{$bus->licence_plate}}</td>
                                <td>{{$bus->registration}}</td>
                                <td>
                                    <div class="float-left mr-2">
                                        <a href="{{ route('buses.edit', [$bus->id])}}" class="btn btn-primary flex-">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('buses.destroy', [$bus->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger color-white"
                                                   onclick="return confirm(`Are you sure you want to delete '{{$bus->licence_plate}}' ?`)">
                                                Delete
                                            </button>
{{--                                            <a class="btn btn-danger color-white" type="submit">--}}
{{-- onclick="return confirm(`Are you sure you want to delete '{{$bus->licence_plate}}' ?`)"--}}
{{--                                                Delete--}}
{{--                                            </a>--}}
                                        </form>
                                    </div>
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
