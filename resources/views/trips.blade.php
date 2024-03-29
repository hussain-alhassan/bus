@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('texts.trips_page_title')}}</div>
                    <div class="card-body">
                        @include('partials.trips-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
