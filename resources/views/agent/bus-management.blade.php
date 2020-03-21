@extends('layouts.agentLayout')
@section('title', 'Buses Management')

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

                {{-- show success message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Buses Management</div>
                    <div class="card-body">
                        <a href="{{route('create_bus')}}" class="btn btn-success">Add Bus</a>
                        @include('agent.partials.buses-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
