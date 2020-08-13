@extends('layouts.adminLayout')
@section('title', 'Agencies Management')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Agencies Management</div>
                    <div class="card-body">
                        <a href="{{route('agencies.create')}}" class="btn btn-success">Add Agency</a>
                        @include('admin.agencies.agencies-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
