@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">



            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4>All Customers</h4>
                        </div>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0"
                                    id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Personal Name</th>
                                            <th>Room Number</th>
                                            <th>Total Numbers</th>
                                            <th>Arrival Date</th>
                                            <th>Depature Date</th>
                                            <th>Email ID</th>
                                            <th>Ph.Number</th>
                                            <th>Paid</th>
                                            <th>Status</th>
                                            <th>Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($maincustomers as $maincustomer)
                                            <tr>


                                                <td>
                                                    {{ $maincustomer->personalName }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->roomNumber }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->totalMembers }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->arrivalDate }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->depatureDate }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->email }}
                                                </td>

                                                <td>
                                                    {{ $maincustomer->phoneNumber }}
                                                </td>


                                                <td>
                                                    @if ($maincustomer->paied == 0)
                                                        <p class="btn btn-danger">Not Paied</p>
                                                    @else
                                                        <p class="btn btn-success">Paied</p>
                                                    @endif
                                                </td>


                                                <td>
                                                    @if ($maincustomer->Status == 0)
                                                        <p class="btn btn-danger">Inactive</p>
                                                    @else
                                                        <p class="btn btn-success">Active</p>
                                                    @endif
                                                </td>




                                                <td>
                                                    {{ $maincustomer->message == null ? 'No massage' : $maincustomer->message }}
                                                </td>




                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
