@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Pricing</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('home.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="sel1" name="roomType">
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
                                    <label>Price</label>
                                    <input type="text" class="form-control" id="usr" name="price">
                                    @error('price')
                                        <div>
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="freeBreakfast">
                                    <label class="form-check-label h5">Free Breakfast</label>

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="freeWifi">
                                    <label class="form-check-label h5">Free Wifi</label>

                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="airConditioning">
                                    <label class="form-check-label h5">Air Conditioning</label>

                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="laundry">
                                    <label class="form-check-label h5">Laundry</label>

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="parking">
                                    <label class="form-check-label h5">Parking</label>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary buttonedit mt-5">
                            Publish Pricing
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
