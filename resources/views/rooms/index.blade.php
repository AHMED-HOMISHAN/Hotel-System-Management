@extends('layouts.app')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">
            {{-- delete --}}
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ Route('rooms.delete') }}" method="POST">
                        <div class="modal-content">
                            <div class="modal-body">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <p>هل متأكد من اغلاق الغرفه .. ؟؟</p>
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
                            <h4 class="card-title float-left mt-2">All Rooms</h4> <a href="{{ route('rooms.add') }}"
                                class="btn btn-primary float-right veiwbutton">Add Room</a>
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
                                            <th>Room Numbers</th>
                                            <th>Room Type</th>
                                            <th>Active / Inactive</th>
                                            <th>Price</th>
                                            <th>Food</th>
                                            <th>Bed Count</th>
                                            <th>Rent</th>
                                            <th>cancellation</th>
                                            <th>Ph.Number</th>
                                            <th>Status</th>
                                            <th>message</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($mainrooms as $mainroom)
                                            <tr>
                                                <td>
                                                    {{ $mainroom->id}}
                                                </td>

                                                <td>
                                                    {{ $mainroom->roomPrice->roomType }}
                                                </td>
                                                <td>
                                                    @if ($mainroom->AC == 0)
                                                        <p class="btn btn-danger">Not active</p>
                                                    @else
                                                        <p class="btn btn-success">active</p>
                                                    @endif


                                                </td>

                                                <td>
                                                        <p class="btn btn-success">{{ $mainroom->roomPrice->price }}</p>
                                                </td>

                                                <td>
                                                    {{ $mainroom->Food == null ? 'No Free Food' : $mainroom->Food }}
                                                </td>
                                                <td>
                                                    {{ $mainroom->BedCount }}
                                                </td>
                                                <td>
                                                    {{ $mainroom->roomPrice->price }}
                                                </td>
                                                <td>
                                                    @if ($mainroom->cancellation == 0.5)
                                                        <p>5% Before 24Hours</p>
                                                    @else
                                                        @if ($mainroom->cancellation == 1.0)
                                                            <p>Free</p>
                                                        @else
                                                            <p>No Cancellation Allow</p>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $mainroom->PhoneNumber }}
                                                </td>

                                                <td>
                                                    @if ($mainroom->status == 0)
                                                        <p class="btn btn-danger">Not Ready</p>
                                                    @else
                                                        <p class="btn btn-success">Ready</p>
                                                    @endif


                                                </td>

                                                <td>
                                                    {{ $mainroom->message == null ? 'No massage' : $mainroom->message}}
                                                </td>

                                                <td>
                                                    <a href="{{ route('rooms.modify',$mainroom->id) }}"  class="edit btn btn-success btn-sm"> <i
                                                            class="fa fa-edit"> </i> </a>
                                                    <button
                                                        onclick="document.getElementById('deletemodal').style.display='block'"
                                                        id="deleteBtn" data-id=" {{ $mainroom->id }} "
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
    @endsection
