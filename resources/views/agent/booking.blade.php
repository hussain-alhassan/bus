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
                            <th scope="col">ID</th>
                            <th scope="col">ID Type</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td scope="row">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#details{{$booking->id}}">
                                        {{$booking->id}}
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="details{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="detailsTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                                            <th>ID</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->id}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->name}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Trip No.</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{ $booking->trip->trip_number}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>From</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{ (App::getLocale() === 'ar') ? $booking->trip->from_city->name : $booking->trip->from_city->name_en }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>To</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{ (App::getLocale() === 'ar') ? $booking->trip->to_city->name : $booking->trip->to_city->name_en }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Departure</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{\Carbon\Carbon::parse($booking->trip->depart)->format('d/m/Y h:i A')}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Office</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->office->name}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nationality</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->nationality}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->email}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->phone}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>National ID</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->national_id}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>National ID expiration Date</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->national_id_exp_date}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>National ID Issuance City</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->national_id_issuance_city}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Passport ID</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->passport_id}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Passport ID Expiration Date</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->passport_exp_date}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Passport Issuance City</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->passport_issuance_city}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Iqama ID</th>
                                                            <td style='text-align: center'>
                                                                <span style="color: #13b238">{{$booking->user->igama_id}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Iqama Expiration Date</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->igama_exp_date}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Iqama Issuance City</th>
                                                            <td style='text-align: center;'>
                                                                <span style="color: #13b238">{{$booking->user->igama_issuance_city}}</span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$booking->user->name}}</td>
                                @if($booking->user->national_id)
                                    <td>{{$booking->user->national_id}}</td>
                                    <td>National ID</td>
                                @elseif($booking->user->passport_id)
                                    <td>{{$booking->user->passport_id}}</td>
                                    <td>Passport</td>
                                @else
                                    <td>{{$booking->user->igama_id}}</td>
                                    <td>Igama ID</td>
                                @endif
                                <td>{{ (App::getLocale() === 'ar') ? $booking->trip->from_city->name : $booking->trip->from_city->name_en }}</td>
                                <td>{{ (App::getLocale() === 'ar') ? $booking->trip->to_city->name : $booking->trip->to_city->name_en }}</td>
                                <td>{{\Carbon\Carbon::parse($booking->trip->depart)->format('d/m/Y')}}</td>
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
                    { extend: 'excel', filename: dateNow(), exportOptions: { columns: [1,2,3,4,5,6] } },
                    { extend: 'pdf', filename: dateNow(), exportOptions: { columns: [1,2,3,4,5,6] } },
                    { extend: 'print', exportOptions: { columns: [1,2,3,4,5,6] } },
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
                    var parts = data[6].split('/');
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
