@extends('layouts.agentLayout')
@section('title', 'Edit Bus')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('common.validation-errors')

                <div class="card">
                    <div class="card-header">Edit Bus</div>
                    <div class="card-body">
                        <a href="{{ route('buses.index') }}" class="btn btn-success">Back to Buses</a>
                        @include('agent.buses.edit-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
