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
    <td>
        <a href="{{ route('approve_booking', [$booking->id])}}" class="btn btn-outline-success"><i class="menu-icon fa fa-check fa-xs"></i></a>
        <a href="{{ route('reject_booking', [$booking->id])}}" class="btn btn-outline-danger"><i class="menu-icon fa fa-times fa-xs"></i></a>
        <a href="{{ route('pend_booking', [$booking->id])}}" class="btn btn-outline-warning"><span style="font-weight: bold">~</span></a>
    </td>
</tr>