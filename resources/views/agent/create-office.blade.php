@extends('layouts.agentLayout')
@section('title', 'Create Office')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('common.validation-errors')

                <div class="card">
                    <div class="card-header">Add a New Office</div>
                    <div class="card-body">
                        <a href="/agent/offices" class="btn btn-success">Back to Offices</a>
                        <div class="mt-4">@include('agent.partials.create-office-form')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
