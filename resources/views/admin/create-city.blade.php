@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create City</div>

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

                    {{-- show success message if there is any --}}
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            City has been created successfully.
                        </div>
                    @endif

                    <div class="card-body">
                        <a href="/admin/cities" class="btn btn-success">Back to Cities</a>
                        @include('admin.partials.create-city-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
