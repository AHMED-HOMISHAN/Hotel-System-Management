@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">


       {{-- To Activate --}}
       <div class="modal fade" id="activemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog">
           <form action="{{ route('staffs.activate') }}" method="POST">
               <div class="modal-content">
                   <div class="modal-body">
                       @csrf
                       @method('POST')
                       <div class="form-group">
                           <p>هل متأكد من رفع الحظر عن الحساب .. ؟؟</p>
                           @csrf
                           <input type="hidden" name="id" id="id">
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button onclick="document.getElementById('activemodal').style.display='none'"
                           class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                       <button type="submit" class="btn btn-success">رفع </button>
                   </div>
               </div>
           </form>
           <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
   </div>
   {{-- To Activate --}}



    {{-- To  --}}
    <div class="modal fade" id="Tomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('staffs.To') }}" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <p>هل متأكد من تغيير نوع الحساب .. ؟؟</p>
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="type" id="type">
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="document.getElementById('Tomodal').style.display='none'"
                        class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success">موافق </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- To  --}}


          {{-- delete --}}
          <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <form action="{{ route('staffs.delete') }}" method="POST">
                  <div class="modal-content">
                      <div class="modal-body">
                          @csrf
                          @method('POST')
                          <div class="form-group">
                              <p>هل متأكد من  حظر الحساب .. ؟؟</p>
                              @csrf
                              <input type="hidden" name="id" id="id">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button onclick="document.getElementById('deletemodal').style.display='none'"
                              class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                          <button type="submit" class="btn btn-danger">حظر </button>
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
             @if (Auth::user()->type=="superAdmin")
             <div class="col">
                <div class="mt-5">
                    <h4 class="card-title float-left mt-2">All Staffs</h4>
                </div>
            </div>
             @endif
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
        <div class="col-lg-12">
          <form action="{{ route('staffs.index') }}" method="GET">
            @csrf
            @method('GET')
            <div class="row formtype">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Staff ID</label>
                  <input
                    class="form-control"
                    type="text"
                    name="StaffID"
                    value="{{ $tempId }}"
                  />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" id="sel1" name="StaffRole">
                    <option value="{{$tempRole }}">{{$tempRole}}</option>
                    <option value="All">All</option>
                    <option value="Room Cleaners">Room Cleaners</option>
                    <option value="Servants">Servants</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Receiptionalist">Receiptionalist</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Search</label>
                  <button
                   type="submit"
                    class="btn btn-success btn-block mt-0 search_button"
                  >
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-table">
            <div class="card-body booking_card">
              <div class="table-responsive">
                <table
                  class="datatable table table-stripped table table-hover table-center mb-0"
                  id="dataTable">
                  <thead>
                    <tr>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Ph.Number</th>
                      <th>User Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Country</th>
                      <th>Address</th>
                      <th>Role</th>
                      <th>Join Date</th>
                      <th>Status</th>
                      @if (Auth::user()->type=='superAdmin')
                        <th class="text-center">Actions</th>
                        <th class="text-right">Change Status</th>
                      @endif
                    </tr>
                  </thead>


                  <tbody>
                    @foreach ($mainStaffs as $mainStaff)
@if ($mainStaff->userDetail->id != Auth::user()->id )

                        <tr>
                            <td>
                                {{ $mainStaff->id }}
                            </td>

                            <td>
                                {{ $mainStaff->userDetail->name }}
                            </td>

                            <td>
                                {{ $mainStaff->userDetail->email }}
                            </td>

                            <td>
                                {{ $mainStaff->phoneNumber }}
                            </td>

                            <td>
                                {{ $mainStaff->userName == null ? "No User Name" : $mainStaff->userName}}
                            </td>

                            <td>
                                {{ $mainStaff->birthdate }}
                            </td>

                            <td>
                                @if ( $mainStaff->gender == 0)
                                    <p>Female</p>
                                @else
                                    <p>Male</p>
                                @endif
                            </td>
                            <td>
                                {{ $mainStaff->country }}
                            </td>

                            <td>
                                {{ $mainStaff->address }}
                            </td>

                            <td>
                                {{ $mainStaff->role }}
                            </td>

                            <td>
                                {{ $mainStaff->joinedDate }}
                            </td>

                            <td>
                                @if ( $mainStaff->userDetail->status == 0)
                                    <p class="btn btn-danger">Blocked</p>
                                @else
                                    <p class="btn btn-success">Active</p>
                                @endif
                            </td>

                            @if (Auth::user()->type=='superAdmin')
                                <td>
                                    <a href="{{ route('staffs.modify',$mainStaff->id) }}"  class="edit btn btn-success btn-sm"> <i
                                            class="fa fa-edit"> </i> </a>
                                  @if ( $mainStaff->userDetail->status == 1)
                                    <button
                                    onclick="document.getElementById('deletemodal').style.display='block'"
                                    id="deleteBtn" data-id=" {{  $mainStaff->userDetail->id }} "
                                    class="edit btn btn-warning btn-sm" data-toggle="model"
                                    data-target="#deletemodel"><i class="fa fa-trash"></i></button>
                                  @else

                                  <button
                                  onclick="document.getElementById('activemodal').style.display='block'"
                                  id="activateBtn" data-id=" {{ $mainStaff->userDetail->id }} "
                                  class="edit btn btn-success btn-sm" data-toggle="model"
                                  data-target="#deletemodel"><i class="fa fa-toggle-on"></i></button>

                                  @endif
                                </td>

                                <td>
                                    @if ($mainStaff->userDetail->type == 'user')
                                        <button  onclick="document.getElementById('Tomodal').style.display='block'" id="ToBtn" data-toggle="model"
                                        data-target="#Tomodal" data-id=" {{ $mainStaff->userDetail->id }} " data-type="{{ $mainStaff->userDetail->type }}" class="btn btn-success">To Admin</button>

                                    @else
                                        <button onclick="document.getElementById('Tomodal').style.display='block'" id="ToBtn" data-toggle="model"
                                        data-target="#Tomodal" data-id=" {{ $mainStaff->userDetail->id }}" data-type="{{ $mainStaff->userDetail->type }}" class="btn btn-warning">To User</button>
                                    @endif
                                </td>

                            @endif


                        </tr>
@endif

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
