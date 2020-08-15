@extends('layouts.agentLayout')
@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('common.validation-errors')
                @include('common.success-message')

                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        @include('agent.profile-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stack('scripts')
    <script>
        function validateLogo() {
            var maxSize = 2048;
            var fileUpload = document.getElementById("logo");
            if (typeof (fileUpload.files) != "undefined") {
                var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(0);
                if (size > maxSize) {
                    alert('The logo may not be greater than ' + (maxSize/1024) + ' MB.');
                    fileUpload.value = '';
                }
            }
        }
    </script>
