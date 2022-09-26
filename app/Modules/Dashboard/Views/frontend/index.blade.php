@extends('frontend.layouts.app')
@section('content')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border">
                <div class="mt-md-0 px-lg-10 py-lg-3">
                    <div class="text-center">
                        <img src="/assets/backend/img/photo.png" class="rounded" alt="..." height="80" width="90">
                        <h6 class="text-bold text-maroon">Mahadi Hassan Babu</h6>
                    </div>
                </div>
                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    {{-- <a class="nav-link active" id="v-pills-basic-info-tab" data-toggle="pill" href="#v-pills-basic-info" role="tab" aria-controls="v-pills-basic-info" aria-selected="true">Basic Information</a> --}}
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Orders</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                            <div class="mx-md-5 pt-1">
                                <h3 class="font-size-18 mb-4">Basic Information</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <th class="px-4 px-xl-5 border-top-0">Name</th>
                                            <td class="border-top-0">{!! $user->name !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Email Address</th>
                                            <td>{!! $user->email !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Contact No.</th>
                                            <td>{!! isset($user->mobile ) ? $user->mobile : "Not Provided" !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Gender</th>
                                            <td>{!! isset($user->gender) ? $user->gender : "Not Provided" !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Member Since </th>
                                            <td>{!! $user->created_at !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Date Of Birth </th>
                                            <td>{!! isset($user->date_of_birth) ? $user->date_of_birth : "Not Provided" !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Organization </th>
                                            <td>{!! isset($user->company_name ) ? $user->company_name : "Not Provided" !!}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                        <div class="border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                            <div class="mx-md-5 pt-1">
                                <h3 class="font-size-18 mb-4">My Orders</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm table-striped">
                                        <tbody>
                                        <tr>
                                            <th class="px-4 px-xl-5 border-top-0">Order Number</th>
                                            <th class="px-4 px-xl-5 border-top-0">Payment Type</th>
                                            <th class="px-4 px-xl-5 border-top-0">Total Amount</th>
                                            <th class="px-4 px-xl-5 border-top-0">Payment Status</th>
                                            <th class="px-4 px-xl-5 border-top-0">Order Status</th>
                                            <th class="px-4 px-xl-5 border-top-0">Action</th>
                                        </tr>

                                        @forelse($orders as $order)
                                        <tr>
                                            <td class="px-4 px-xl-5 border-top-0">{{ $order->order_number }}</td>
                                            <td class="px-4 px-xl-5 border-top-0">{{ $order->payment_type }}</td>
                                            <td class="px-4 px-xl-5 border-top-0">{{ $order->total_amount }}</td>
                                            <td class="px-4 px-xl-5 border-top-0">{{ $order->payment_status }}</td>
                                            <td class="px-4 px-xl-5 border-top-0">{{ $order->order_status }}</td>
                                            <td class="px-4 px-xl-5 border-top-0">
                                                @if($order->payment_status == 'unpaid')
                                                <a href="/make-payment/{{ $order->id }}" class="btn btn-sm btn-success">Pay</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No orders found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                            <div class="mx-md-5 pt-1">
                                <h3 class="font-size-18 mb-4">Settings</h3>
                                <div class="row">
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#change_pass">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal -->
  {!! Form::open(['url'=>'/change-password','method'=>'POST']) !!}
  <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalCenterTitle">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <label>Current Password</label>
                {!! Form::text('old_password','',['class'=>'form-control','placeholder'=>'Enter your old password','required'=>true]) !!}
            </div><br>
            <div>
                <label>New Password</label>
                {!! Form::text('new_password','',['class'=>'form-control','placeholder'=>'Enter your New password','required'=>true]) !!}
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}

@endsection
