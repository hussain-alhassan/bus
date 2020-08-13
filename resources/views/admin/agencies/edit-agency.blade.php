@extends('layouts.adminLayout')
@section('title', 'Edit Agency')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('common.validation-errors')

                <div class="card">
                    <div class="card-header">Edit Agency</div>
                    <div class="card-body">
                        <a href="{{route('agencies.index')}}" class="btn btn-success">Back to Agency</a>
                        @include('admin.agencies.edit-agency-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
