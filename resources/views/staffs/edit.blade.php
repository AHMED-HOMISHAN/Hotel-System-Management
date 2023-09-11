@extends('layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title mt-5">Edit Staff</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="{{ route('staffs.edit') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row formtype">
                <input type="hidden" name="staffId" value="{{ $mainStaff->user_id_fk  }}"/>
                <input type="hidden" name="userId" value="{{ $userDetail->id }}"/>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Personal Name</label>
                  <input
                    class="form-control"
                    type="text"
                    value="{{$userDetail->name}}"
                    name="personalName"
                  />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>User Name</label>
                  <input
                    class="form-control"
                    type="text"
                    value="{{$mainStaff->userName}}"
                    name="userName"

                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email ID</label>
                  <input
                    class="form-control"
                    type="text"
                    value="{{$userDetail->email}}"
                    disabled

                  />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input
                    class="form-control"
                    type="text"
                    value="{{$mainStaff->phoneNumber}}"
                    name="phoneNumber"

                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" id="sel1" name="role">
                    <option value="{{ $mainStaff->role }}">{{ $mainStaff->role }}</option>
                    <option value="Room Cleaner">Room Cleaner</option>
                    <option value="Servants">Servants</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Receiptionalist">Receiptionalist</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit ml-2">
                Save
              </button>
          </form>
        </div>
      </div>

    </div>
  </div>

@endsection

