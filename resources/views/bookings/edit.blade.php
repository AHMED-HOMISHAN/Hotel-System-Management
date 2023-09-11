@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Booking</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('bookings.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Personal Name</label>
                                    <input type="hidden" name="temp_img" value="{{$mainbookings->image}}"/>
                                    <input class="form-control" type="text" value="{{ $mainbookings->personalName }}"
                                        name="personalName">
                                        @error('personalName')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="sel2" name="roomNumber">
                                        <option>{{ $rooms->roomType }}</option>
                                        <option>Single</option>
                                        <option>Double</option>
                                        <option>Quad</option>
                                        <option>King</option>
                                        <option>Suite</option>
                                        <option>Villa</option>
                                    </select>
                                    @error('roomNumber')
                                    <div>
                                        <p class="text-danger"> {{ $message }}</p>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Members</label>
                                    <select class="form-control" id="sel3" name="totalMembers">
                                        <option>{{ $mainbookings->totalMembers }}</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                    @error('totalMembers')
                                    <div>
                                        <p class="text-danger"> {{ $message }}</p>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Arrival Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker"  data-date-format="YYYY-MM-DD"  name="arrivalDate"
                                            value="{{ $mainbookings->arrivalDate }}">
                                            @error('arrivalDate')
                                            <div>
                                                <p class="text-danger"> {{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Depature Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker"  data-date-format="YYYY-MM-DD"  name="depatureDate"
                                            value="{{ $mainbookings->depatureDate }}">
                                            @error('depatureDate')
                                            <div>
                                                <p class="text-danger"> {{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="text" class="form-control" id="usr" name="email"
                                        value="{{ $mainbookings->email }}">
                                        @error('email')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="usr1" name="phoneNumber"
                                        value="{{ $mainbookings->phoneNumber }}">
                                        @error('phoneNumber')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>File Upload</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="dropify"  name="image"  data-default-file="{{asset('images/personalIdentity') }}/{{$mainbookings->image}}"/>
                                    </div>
                                    @error('image')
                                    <div>
                                        <p class="text-danger"> {{ $message }}</p>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pay</label>
                                    <select class="form-control" id="sel2" name="paied">
                                        @if ($mainbookings->paied == 1)
                                            <option value="1" selected>It is paied</option>
                                            <option value="0">It is not paied</option>
                                        @else
                                            <option value="1">It is paied</option>
                                            <option value="0" selected>It is not paied</option>
                                        @endif

                                    </select>
                                    @error('paied')
                                    <div>
                                        <p class="text-danger"> {{ $message }}</p>
                                    </div>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary buttonedit1">Edit Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
