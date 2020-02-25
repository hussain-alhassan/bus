@extends('layouts.agentLayout')
@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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

                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        @include('admin.partials.profile-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
