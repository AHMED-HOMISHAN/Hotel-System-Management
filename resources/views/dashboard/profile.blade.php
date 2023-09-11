@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image" src="{{asset('images')}}/StaffIdentity/{{$userDetails['image']}}" />
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">{{ $userDetails['name'] }}</h4>
                                <h6 class="text-muted mt-1">{{ $userDetails['type'] }}</h6>
                                <div class="user-Location mt-1">
                                    <i class="fas fa-map-marker-alt"></i> {{ $staffDetails['address'] ==null ?'No Address': $staffDetails['address'] }}
                                </div>

                            </div>
                            <div class="col-auto profile-btn">


                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span>
                                                <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                        class="fa fa-edit mr-1"></i>Edit</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                    Name
                                                </p>
                                                <p class="col-sm-9">{{ $userDetails['name'] }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                    Date of Birth
                                                </p>
                                                <p class="col-sm-9">  {{ $staffDetails['birthdate'] }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                    Email ID
                                                </p>
                                                <p class="col-sm-9">
                                                    <a href="#" class="__cf_email__">
                                                    {{ $userDetails['email'] }}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                    Mobile
                                                </p>
                                                <p class="col-sm-9">{{ $staffDetails['phoneNumber'] }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0">Address</p>
                                                <p class="col-sm-9 mb-0">
                                                    {{ $staffDetails['address'] == null ? 'No Address' : $staffDetails['address']}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="id" value="{{ $userDetails['id'] }}"/>
                                                        <input type="hidden" name="user_id" value="{{ $staffDetails['user_id_fk'] }}"/>
                                                        <input type="hidden" name="temp_img" value="{{$userDetails['image']}}"/>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>User Image</label>
                                                                <div class="custom-file mb-3">
                                                                    <input type="file" class="dropify"  id="customFile" data-default-file="{{asset('images')}}/StaffIdentity/{{$userDetails['image']}}" name="image">
                                                                </div>
                                                                @error('image')
                                                                <div>
                                                                    <p class="text-danger"> {{ $message }}</p>
                                                                </div>
                                                            @enderror
                                                            </div>
                                                        </div>


                                                        <div class="row form-row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group ">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $userDetails['name'] }}" name="Name"/>
                                                                </div>
                                                            </div>


                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>User Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $staffDetails['userName'] }}"  name="userName"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="cal-icon">
                                                                        <input id="birthdate" type="date" class="form-control datetimepicker"  data-date-format="YYYY-MM-DD"  name="birthdate" value="{{ $staffDetails['birthdate'] }}" required autocomplete="birthdate" placeholder="Birth Date">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email ID</label>
                                                                    <input type="email" class="form-control"
                                                                        value="{{ $userDetails['email'] }}" name="email" disabled/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Mobile</label>
                                                                    <input type="text" value="{{ $staffDetails['phoneNumber'] }}"
                                                                        class="form-control" name="phoneNumber"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title">
                                                                    <span>Address</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $staffDetails['address'] }}" name="address"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <h5 class="form-title">
                                                                    <span>Country</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $staffDetails['country'] }}" name="country"/>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <select class="form-control @error('gender') is-invalid @enderror" required id="gender" name="gender">
                                                                        <option value="1">Male</option>
                                                                        <option value="0">Female</option>
                                                                    </select>
                                                                    @error('gender')
                                                                    <div>
                                                                        <p class="text-danger"> {{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">
                                                            Save Changes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="password_tab" class="tab-pane fade">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form>
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" />
                                                </div>
                                                <button class="btn btn-primary" type="submit">
                                                    Save Changes
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
