@extends('layouts.agentLayout')
@section('title')
    Booking
@stop
@section('styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Bookings</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Start Date</label>
                            <input type="email" class="form-control" id="inputStart">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">End Date</label>
                            <input type="password" class="form-control" id="inputEnd">
                        </div>
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="form-group" >--}}
                            {{--<label class="control-label col-md-6 col-sm-6 col-xs-12" for="min">Start Date--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                {{--<input  type="text" name="min" id="min" class="form-control col-md-7 col-xs-12" value="{{ old('min') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="max">End Date--}}
                            {{--</label>--}}
                            {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                                {{--<input type="text" name="max" id="max" class="form-control col-md-7 col-xs-12" value="{{ old('max') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="table-responsive">
                        <table id="booking" style="border-bottom: 0px; border-spacing: 0 15px; border-collapse: separate;" class="table dt-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#booking').DataTable();
        });
    </script>
@stop
