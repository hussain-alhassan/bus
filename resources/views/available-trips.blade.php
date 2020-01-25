@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Trips Details </h5>
                    <div class="card-body d-flex align-items-baseline">
                        <div class="pr-4">
                            From: {{$searchInputs['from']}} -> {{$searchInputs['to']}} |
                            Departure: {{$searchInputs['depart']->format(env('DISPLAY_DATETIME_FORMAT'))}} -
                            Return: {{$searchInputs['return'] ? $searchInputs['return']->format(env('DISPLAY_DATETIME_FORMAT')) : '-'}} |
                            Seats: {{$searchInputs['seats']}}
                        </div>
                        <div>
                            <a href="{{sprintf('/?from=%s&to=%s&depart=%s&return=%s&seats=%s', $searchInputs['from'],
                                                $searchInputs['to'],
                                                $searchInputs['depart']->format('Y-m-d'),
                                                $searchInputs['return'] ? $searchInputs['return']->format('Y-m-d') : '',
                                                $searchInputs['seats'])}}" class="btn btn-primary">Edit Search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($availableTrips as $trip)
            <div class="row pb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <img src="..." class="img-fluid img-thumbnail" alt="logo">
                            {{$trip['agency']}}
                        </div>
                        <div class="card-body">
                            {{$trip['depart']->format(env('DISPLAY_DATETIME_FORMAT'))}} - {{$trip['depart_time']}} -
                            {{$trip['arrival_day']}} - {{$trip['arrival_time']}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
