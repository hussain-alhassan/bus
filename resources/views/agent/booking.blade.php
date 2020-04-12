@extends('layouts.agentLayout')
@section('title', 'Bookings')
@section('styles')
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
                            <label for="min">Start Date</label>
                            <input  type="date" name="min" id="min" class="form-control" value="{{ old('min') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="max">End Date</label>
                            <input type="date" name="max" id="max" class="form-control" value="{{ old('max') }}">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="booking" style="border-bottom: 0px; border-spacing: 0 15px; border-collapse: separate;" class="table dt-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td scope="row">{{$booking->id}}</td>
                                <td>
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#details{{$booking->id}}">
                                        {{$booking->user->name}}
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="details{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="detailsTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailsTitle">{{$booking->user->name}}'s Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <tbody id="tbody">
                                                            <tr>
                                                                <th>Name</th>
                                                                <td style='text-align: center; width: 80%;'>
                                                                    <span style="color: #13b238">{{$booking->user->name}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Name</th>
                                                                <td style='text-align: center; width: 80%;'>
                                                                    <span style="color: #13b238">{{$booking->user->name}}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$booking->user->nationality}}</td>
                                <td>{{ (App::getLocale() === 'ar') ? $booking->from_city->name : $booking->from_city->name_en }}</td>
                                <td>{{ (App::getLocale() === 'ar') ? $booking->to_city->name : $booking->to_city->name_en }}</td>
                                @if($booking->status == 'Confirmed')
                                    <td><span class="badge badge-success">{{$booking->status}}</span></td>
                                @elseif($booking->status == 'Pending')
                                    <td><span class="badge badge-warning">{{$booking->status}}</span></td>
                                @elseif($booking->status == 'Rejected')
                                    <td><span class="badge badge-danger">{{$booking->status}}</span></td>
                                @endif
                            </tr>

                        @endforeach
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
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#booking').DataTable({
                "dom": 'Bfrtip',
                "buttons": [
                    { extend: 'excel', filename: dateNow() },
                    { extend: 'pdf', filename: dateNow() },
                    'print'
                ]
            });

            function dateNow() {
                var now = new Date();
                return 'Bookings ' + now.getDate() + '-' + (now.getMonth()+1) + '-' + now.getFullYear();
            }

            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    if ($('#min').val()) {
                        var min = new Date($('#min').val());
                        min.setHours(0,0,0,0);
                    }
                    if ($('#max').val()) {
                        var max = new Date($('#max').val());
                        max.setHours(0,0,0,0);
                    }
                    var parts = data[4].split('/');
                    var startDate = new Date(parts[1]+'/'+parts[0]+'/'+parts[2]);

                    if (min == null && max == null) { return true; }
                    if (min == null && startDate <= max) { return true;}
                    if(max == null && startDate >= min) {return true;}
                    if (startDate <= max && startDate >= min) { return true; }
                    return false;
                }
            );
            var table = $('#booking').DataTable();

            $('#min, #max').change(function () {
                table.draw();
            });
        });


    </script>
@stop
