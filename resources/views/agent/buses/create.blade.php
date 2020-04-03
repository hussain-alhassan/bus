@extends('layouts.agentLayout')
@section('title', 'Create Bus')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('common.validation-errors')

                <div class="card">
                    <div class="card-header">Add a New Bus</div>
                    <div class="card-body">
                        <a href="{{ route('buses.index') }}" class="btn btn-success">Back to buses</a>
                        <div class="mt-4">@include('agent.buses.create-form')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
