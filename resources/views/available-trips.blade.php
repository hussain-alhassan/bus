@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Trips Details</h5>
                    <div class="card-body d-flex align-items-baseline">
                        <div class="pr-4">
                            From: {{$searchInputs['from']->getName()}} ---> {{$searchInputs['to']->getName()}} |
                            Departure: {{$searchInputs['depart']->format(config('app.display_timestamps_short_format'))}} -
                            Return: {{$searchInputs['return'] !== '-' ? $searchInputs['return']->format(config('app.display_timestamps_short_format')) : '-'}} |
                            Seats: {{$searchInputs['seats']}}
                        </div>
                        <div>
                            <a href="{{sprintf('/?from=%s&to=%s&depart=%s&return=%s&seats=%s',
                                                $searchInputs['from']->id,
                                                $searchInputs['to']->id,
                                                $searchInputs['depart']->format('Y-m-d'),
                                                $searchInputs['return'] !== '-' ? $searchInputs['return']->format('Y-m-d') : '',
                                                $searchInputs['seats'])}}" class="btn btn-primary">Edit Search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($availableTrips->isEmpty())
            <div class="p-3 mb-2 bg-danger text-white">Sorry! There are no available trips. Please try different dates</div>
        @else
            <h4 class="text-center mb-2">Departure</h4>
            @foreach($availableTrips as $trip)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{$trip->agency->getImageContent()}}" class="img-fluid img-thumbnail" alt="logo"
                                     style="width: 100px; height: 100px; margin: 0 20px 0 20px">
                                <span>{{$trip->agency->getName()}}</span>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <span>{{$trip->getDepart()}}</span><br>
                                    @if($trip->is_wifi)<i class="fas fa-wifi">&nbsp;FREE WIFI</i><br>@endif
                                    @if($trip->is_refreshment)<i class="fas fa-cocktail">&nbsp;FREE Refreshment</i><br>@endif
                                    @if($trip->is_meal)<i class="fas fa-utensils">&nbsp;&nbsp;FREE Meal</i><br>@endif
                                    @if($trip->is_bathroom)<i class="fas fa-toilet">&nbsp;&nbsp;Bus Bathroom</i>@endif
                                </div>
                                <div class="float-left text-center w-50">
                                    There are only <span class="font-weight-bold">{{$trip->available_seats}}</span> seats left
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bold">SAR {{$trip->price}}</span><br>
                                    <span>SAR {{$trip->price * $searchInputs['seats']}}&nbsp;total</span><br>
                                    <button type="button" class="btn btn-success">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
