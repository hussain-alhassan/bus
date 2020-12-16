<div class="row">
    <div class="col-md-12">
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active">
                @if($trips->isEmpty())
                    <h5>
                        There are no trips. Please add trips.
                    </h5>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Price</th>
                            <th scope="col">Available Seats</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trips as $trip)
                            <tr>
                                <td>{{$trip->trip_number}}</td>
                                <td>{{$trip->from_city->name_en}}</td>
                                <td>{{$trip->to_city->name_en}}</td>
                                <td>{{$trip->getDepart()}}</td>
                                <td>SAR {{$trip->price}}</td>
                                <td style="width: 12%">{{$trip->available_seats}}</td>
                                <td>
                                    <div class="float-left mr-2">
                                        <a href="{{ route('trips.edit', [$trip->id])}}" class="btn btn-primary flex-">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('trips.destroy', [$trip->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger color-white"
                                                   onclick="return confirm(`Are you sure you want to delete trip number '{{$trip->trip_number}}' ?`)">
                                                Delete
                                            </button>
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
