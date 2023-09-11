@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Room</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row formtype">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="sel1" name="roomType">
                                        @foreach ($mainRoomType as $type)

                                            <option value="{{ $type->id }}">{{ $type->roomType }}</option>

                                        @endforeach

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
                                    <select class="form-control" id="sel" name="BedCount">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
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
                                    <select class="form-control" id="sel4" name="cancellation">
                                        <option value="1.0">Free</option>
                                        <option value="0.05">5% Before 24Hours</option>
                                        <option value="0.0">No Cancellation Allow</option>
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
                                    <input type="text" class="form-control" id="usr1" name="PhoneNumber">
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
                                        <input type="file" class=" dropify"  id="customFile" data-default-file="{{ asset('../resources') }}/img/placeholder.jpg"  name="image">
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
                                    <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary buttonedit ml-2">add</button>
                        <button type="button" class="btn btn-primary buttonedit">Cancel</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
