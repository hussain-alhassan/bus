@extends('layouts.agentLayout')
@section('title', 'Trips Management')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Trips Management</div>
                    <div class="card-body">
                        <a href="{{route('trips.create')}}" class="btn btn-success">Add Trip</a>
                        @include('agent.trips.trips-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
