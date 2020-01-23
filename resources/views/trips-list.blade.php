<div class="row">
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-upcoming-tab" data-toggle="tab"
                   href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="true">Upcoming</a>
                <a class="nav-item nav-link" id="nav-history-tab" data-toggle="tab"
                   href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="false">History</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-upcoming" role="tabpanel"
                 aria-labelledby="nav-upcoming-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Return</th>
                            <th scope="col">Travel Agency</th>
                            <th scope="col">Seats</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($upcomingTrips as $key => $trip)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$trip['from']}}</td>
                            <td>{{$trip['to']}}</td>
                            <td>{{$trip['depart']}}</td>
                            <td>{{$trip['return']}}</td>
                            <td>{{$trip['company_id']}}</td>
                            <td>{{$trip['seats']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-history" role="tabpanel"
                 aria-labelledby="nav-history-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Return</th>
                            <th scope="col">Travel Agency</th>
                            <th scope="col">Seats</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($history as $key => $trip)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$trip['from']}}</td>
                            <td>{{$trip['to']}}</td>
                            <td>{{$trip['depart']}}</td>
                            <td>{{$trip['return']}}</td>
                            <td>{{$trip['company_id']}}</td>
                            <td>{{$trip['seats']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
