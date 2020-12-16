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
                    @include('common.success-message')
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
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Seats</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            @include('agent.bookings.bookings-list')
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
