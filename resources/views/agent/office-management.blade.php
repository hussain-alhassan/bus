@extends('layouts.agentLayout')
@section('title', 'Offices Management')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Offices Management</div>
                    <div class="card-body">
                        <a href="{{route('create_office')}}" class="btn btn-success">Add Office</a>
                        @include('agent.partials.main-branch-form')
                        @include('agent.partials.offices-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
