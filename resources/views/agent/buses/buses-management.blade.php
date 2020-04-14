@extends('layouts.agentLayout')
@section('title', 'Buses Management')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Buses Management</div>
                    <div class="card-body">
                        <a href="{{route('buses.create')}}" class="btn btn-success">Add Bus</a>
                        @include('agent.buses.buses-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
