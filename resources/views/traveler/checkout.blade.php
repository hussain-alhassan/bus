@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Ticket Details</div>

                    <div class="card-body">
                        <div class="pr-4">
                            <span>From: {{$searchInputs['from']->getName()}} ---> {{$searchInputs['to']->getName()}}</span><br>
                            <span>Departure: {{$searchInputs['depart']->format(config('app.display_timestamps_short_format'))}}</span><br>
                            <span>Return: {{$searchInputs['return'] !== '-' ? $searchInputs['return']->format(config('app.display_timestamps_short_format')) : '-'}}</span><br>
                            <span>Seats: {{$searchInputs['seats']}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Invoice Details</div>
                    <div class="card-body">
                        @for($i = 1; $i <= intval($searchInputs['seats']); $i++)
                            <span>Traveler: {{$i}}</span><span class="float-right">SAR {{$trip->price}}</span><br>
                        @endfor
                        <hr>
                        <span>Total: </span><span class="float-right">SAR {{$trip->price * intval($searchInputs['seats'])}}</span>
                    </div>
                    @if(Auth::check())
                    <a href="{{sprintf('%s?depart_trip=%s&seats=%s',
                                       'book',
                                       Request::get('depart_trip'),
                                       $searchInputs['seats'])}}"
                       class="btn btn-success float-right">Book</a>
                    @else
                    <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('partials.login-form')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
