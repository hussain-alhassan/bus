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
{{--                                    <a href="/admin/agency/{{$agency->id}}/edit/" class="btn btn-primary">Edit</a>--}}
                                    <a href="{{route('agencies.edit', ['agency' => $agency->id])}}" class="btn btn-primary">Edit</a>
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
