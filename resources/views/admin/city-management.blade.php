@extends('layouts.app')
@section('title', 'City Management')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

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

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">City Management</div>
                    <div class="card-body">
                        <a href="/admin/city/create" class="btn btn-success">Add City</a>
                        @include('admin.partials.cities-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
