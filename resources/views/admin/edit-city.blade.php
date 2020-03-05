@extends('layouts.adminLayout')
@section('title', 'Edit Office')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- show validation errors if there is any --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Edit City</div>
                    <div class="card-body">
                        <a href="/admin/cities" class="btn btn-success">Back to Cities</a>
                        @include('admin.partials.edit-city-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
