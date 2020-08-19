@extends('layouts.agentLayout')
@section('title', 'Create Trip')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('common.validation-errors')

                <div class="card">
                    <div class="card-header">Add a New Trip</div>
                    <div class="card-body">
                        <a href="{{ route('trips.index') }}" class="btn btn-success">Back to trips</a>
                        <div class="mt-4">@include('agent.trips.create-form')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
