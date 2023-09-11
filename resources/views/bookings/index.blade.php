@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            {{-- delete --}}
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ Route('bookings.delete') }}" method="POST">
                        <div class="modal-content">
                            <div class="modal-body">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <p>هل متأكد من الغاء  .. ؟؟</p>
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById('deletemodal').style.display='none'"
                                    class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-danger">حذف </button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            {{-- delete --}}


            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Appointments</h4>
                            <a href="{{ route('bookings.add') }}" class="btn btn-primary float-right veiwbutton ">Add
                                Booking</a>
                        </div>
                    </div>
                </div>
            </div>



            {{-- message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            {{-- message --}}

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0"
                                    id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
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
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($mainbookings as $mainbooking)
                                            <tr>
                                                <td>
                                                    {{ $mainbooking->id }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->personalName }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->roomNumber }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->totalMembers }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->arrivalDate }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->depatureDate }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->email }}
                                                </td>

                                                <td>
                                                    {{ $mainbooking->phoneNumber }}
                                                </td>


                                                <td>
                                                    @if ($mainbooking->paied == 0)
                                                        <p class="btn btn-danger">Not Paied</p>
                                                    @else
                                                        <p class="btn btn-success">Paied</p>
                                                    @endif
                                                </td>


                                                <td>
                                                    @if ($mainbooking->Status == 0)
                                                        <p class="btn btn-danger">Inactive</p>
                                                    @else
                                                        <p class="btn btn-success">Active</p>
                                                    @endif
                                                </td>




                                                <td>
                                                    {{ $mainbooking->message == null ? 'No massage' : $mainbooking->message }}
                                                </td>


                                                <td>
                                                    <a href="{{ route('bookings.modify', $mainbooking->id) }}"
                                                        class="edit btn btn-success btn-sm"> <i class="fa fa-edit"> </i>
                                                    </a>
                                                    <button
                                                        onclick="document.getElementById('deletemodal').style.display='block'"
                                                        id="deleteBtn" data-id=" {{ $mainbooking->id }} "
                                                        class="edit btn btn-danger btn-sm" data-toggle="model"
                                                        data-target="#deletemodel"><i class="fa fa-trash"></i></button>
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
