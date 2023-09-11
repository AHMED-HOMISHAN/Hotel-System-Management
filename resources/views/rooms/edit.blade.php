@extends('layouts.app')

@section('content')

    @if ($mainrooms)
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Edit Room</h3>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('rooms.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row formtype">
                                <input type="hidden" name="temp_img" value="{{$mainrooms->image}}"/>

                                <input type="hidden" name="id" value="{{ $mainrooms->id }}"/>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Room Type</label>
                                        <select class="form-control" id="sel1" name="roomType">
                                            <option>{{ $mainrooms->roomType }}</option>
                                            <option>Single</option>
                                            <option>Double</option>
                                            <option>Quad</option>
                                            <option>King</option>
                                            <option>Suite</option>
                                            <option>Villa</option>
                                        </select>
                                        @error('roomType')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Food</label>
                                        <select class="form-control" id="sel3" name="Food">
                                            <option>{{ $mainrooms->Food }}</option>
                                            <option>Free Breakfast</option>
                                            <option>Free Lunch</option>
                                            <option>Free Dinner</option>
                                            <option>Free Breakfast & Dinner</option>
                                            <option>Free Welcome Drink</option>
                                            <option>No Free Food</option>
                                        </select>
                                        @error('Food')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bed Count</label>
                                        <select class="form-control" id="sel4" name="BedCount">
                                            <option>{{ $mainrooms->BedCount }}</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                         @error('BedCount')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Charges For cancellation</label>
                                        <select class="form-control" id="sel5" name="cancellation">
                                            @if ($mainrooms->cancellation == 0.0)
                                                <option value="1.0">Free</option>
                                                <option value="0.05">5% Before 24Hours</option>
                                                <option  value="0.0" selected>No Cancellation Allow</option>
                                            @else
                                                @if ($mainrooms->cancellation == 1.0)
                                                    <option  value="1.0" selected>Free</option>
                                                    <option  value="0.05" >5% Before 24Hours</option>
                                                    <option  value="0.0">No Cancellation Allow</option>
                                                @else
                                                    @if ($mainrooms->cancellation == 0.05)
                                                        <option  value="1.0">Free</option>
                                                        <option  value="0.05" selected>5% Before 24Hours</option>
                                                        <option  value="0.0">No Cancellation Allow</option>
                                                    @endif
                                                @endif

                                            @endif

                                        </select>
                                        @error('cancellation')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" id="usr1"
                                            value="{{ $mainrooms->PhoneNumber }}" name="PhoneNumber"/>
                                            @error('PhoneNumber')
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
                                            <input type="file" class="dropify"  name="image"  data-default-file="{{ asset('images/Rooms') }}/{{ $mainrooms->image }}">
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
                                        <label>Message</label>
                                        <textarea class="form-control" rows="5" id="comment" name="massage" placeholder="{{ $mainrooms->massage }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary buttonedit ml-2">
                                Save
                            </button>
                            <a htef="#" class="btn btn-primary buttonedit">
                                Cancel
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection
