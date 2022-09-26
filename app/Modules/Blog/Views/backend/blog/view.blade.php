@extends('backend.layouts.app')
@section('content')
    <ol class="breadcrumb alert alert-info p-2">
        <li class="breadcrumb-item"><strong>Created By - </strong> <span>{{ ($blog->user->name) ?? '-' }} </span></li>
        <li class="breadcrumb-item"><strong>Created At - </strong> <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F , Y') }} at {{ \Carbon\Carbon::parse($blog->created_at)->format('g:i A') }} </span></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-list-alt"></i> Blog Details</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Title </div>
                        <div class="col-lg-8"> {{ $blog->title }} </div>
                    </div>
    
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Date </div>
                        <div class="col-lg-8"> 
                        {{ ($blog->date) ? \Carbon\Carbon::parse($blog->date)->format('d F,Y') : '-' }} 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Status </div>
                        <div class="col-lg-8">
                            @if($blog->status == 1) 
                            <label class='badge badge-success'>Active</label>
                            @else
                              <label class='badge badge-danger'> Inactive</label> 
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Content</div>
                        <div class="col-lg-8">
                          {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div><!--card-->
@endsection
