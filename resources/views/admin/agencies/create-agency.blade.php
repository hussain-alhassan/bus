@extends('layouts.adminLayout')
@section('title', 'Create Agency')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Create Agency</div>
                    <div class="card-body">
                        <a href="{{route('agencies.index')}}" class="btn btn-success">Back to Agencies</a>
                        @include('admin.agencies.create-agency-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
