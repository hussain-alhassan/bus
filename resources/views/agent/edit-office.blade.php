@extends('layouts.agentLayout')
@section('title', 'Edit Office')

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
                    <div class="card-header">Edit Office</div>
                    <div class="card-body">
                        <a href="/agent/offices" class="btn btn-success">Back to Offices</a>
                        @include('agent.partials.edit-office-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
