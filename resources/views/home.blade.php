<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hotel</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../resources/') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('../resources/') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('../resources/') }}/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../resources/') }}/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="{{ asset('../resources/') }}/css/feathericon.min.css">

    <link rel="stylesheet" href="{{ asset('../resources/') }}/plugins/morris/morris.css">

    <link rel="stylesheet" href="{{ asset('../resources/') }}/css/style.css">

</head>

<body>

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                   @if (Auth::user()->type == 'superAdmin' || Auth::user()->type == 'admin')
                   <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Pricing</h4>
                        <a href="{{ route('home.add') }}" class="btn btn-primary float-right veiwbutton">Add
                            Pricing</a>

                    <div class="m-5 mt-7">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary float-right veiwbutton">Go Dashboard
                            </a>
                    </div>
                </div>
                   @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="pricing py-5">
                    <div class="container">
                        <div class="row  mt-5">
@foreach ($data as $displayDATA )


                            <div class="col-lg-3">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">{{ $displayDATA->roomType }}</h5>
                                        <h6 class="card-price text-center mt-3">$ {{ $displayDATA->price }}<span class="period"></span>
                                        </h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li>
                                                <span class="fa-li">
                                                   @if ($displayDATA->freeBreakfast=='0')
                                                   <i>x</i>
                                                   @else
                                                   <i class="fas fa-check"></i>
                                                   @endif
                                                   </span>Free
                                                Breakfast
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    @if ($displayDATA->freeWifi=='0')
                                                    <i>x</i>
                                                    @else
                                                    <i class="fas fa-check"></i>
                                                    @endif
                                                </span>Free Wifi
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    @if ( $displayDATA->airConditioning=='0')
                                                        <i>x</i>

                                                    @else
                                                        <i class="fas fa-check"></i>

                                                    @endif
                                                </span>Air
                                                Conditioning</li>
                                            <li><span class="fa-li">
@if ($displayDATA->laundry =='0')
<i>x</i>

@else
<i class="fas fa-check"></i>

@endif
                                            </span>Laundry
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    @if ($displayDATA->Parking=='0')
                                                    <i>x</i>

                                                    @else
                                                    <i class="fas fa-check"></i>

                                                    @endif
                                                </span>Parking
                                            </li>
                                        </ul>
                                        <a href="edit-pricing.html"
                                            class="btn btn-block btn-primary text-uppercase">Edit</a>
                                    </div>
                                </div>
                            </div>
@endforeach
                        </div>
                    </div>
                </section>
            </div>

        </div>


        <script src="{{ asset('../resources/') }}/js/jquery-3.5.1.min.js"></script>

        <script src="{{ asset('../resources/') }}/js/popper.min.js"></script>
        <script src="{{ asset('../resources/') }}/js/bootstrap.min.js"></script>

        <script src="{{ asset('../resources/') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('../resources/') }}/plugins/raphael/raphael.min.js"></script>

        <script src="{{ asset('../resources/') }}/js/script.js"></script>
</body>

</html>
