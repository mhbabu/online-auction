@extends('backend.layouts.app')
@section('content')
    <ol class="breadcrumb alert alert-info p-2">
        <li class="breadcrumb-item"><strong>Created At - </strong> <span>{{ \Carbon\Carbon::parse($contactUs->created_at)->format('d F , Y') }} at {{ \Carbon\Carbon::parse($contactUs->created_at)->format('g:i A') }} </span></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-list-alt"></i> Message Details</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Status </div>
                        <div class="col-lg-8">
                            @if($contactUs->status == 'Seen') 
                            <label class='badge badge-success'>Seen</label>
                            @else
                              <label class='badge badge-danger'> Not Seen</label> 
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Name </div>
                        <div class="col-lg-8"> {{ $contactUs->name }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Email </div>
                        <div class="col-lg-8"> {{ $contactUs->email }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> subject </div>
                        <div class="col-lg-8"> {{ $contactUs->subject }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Message </div>
                        <div class="col-lg-8"> {{ $contactUs->message }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.contact-us.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div><!--card-->
@endsection
