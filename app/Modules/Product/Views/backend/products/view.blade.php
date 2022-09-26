@extends('backend.layouts.app')
@section('content')
    <ol class="breadcrumb alert alert-info p-2">
        <li class="breadcrumb-item"><strong>Created By - </strong> <span>{{ ($product->user_name) ? $product->user_name : '-' }} </span></li>
        <li class="breadcrumb-item"><strong>Created At - </strong> <span>{{ \Carbon\Carbon::parse($product->created_at)->format('d F , Y') }} at {{ \Carbon\Carbon::parse($product->created_at)->format('g:i A') }} </span></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-list-alt"></i> Product Details</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Title </div>
                        <div class="col-lg-8"> {{ ($product->title) ? $product->title : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Category </div>
                        <div class="col-lg-8"> {{ ($product->category_name) ? $product->category_name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Price </div>
                        <div class="col-lg-8"> <span class="badge badge-success"> BDT {{( $product->price) ?  $product->price : '0' }} Tk</span> </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Start Time </div>
                        <div class="col-lg-8"> {{( $product->start_time) ?  $product->start_time : '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> End Time </div>
                        <div class="col-lg-8"> {{( $product->end_time) ?  $product->end_time : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Slug </div>
                        <div class="col-lg-8"> {{ ($product->slug) ? $product->slug : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Photos </div>
                        <div class="col-lg-8">
                            @if(count($photos) > 0)
                                @foreach($photos as $photo)
                                <img class="img img-bordered-sm m-1" src="{{ url($photo->path) }}" alt="{{ $product->name }}" height="120" width="120">
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Status </div>
                        <div class="col-lg-8">
                            @if($product->status == 1) <label class='badge badge-success'>Active</label> @else <label class='badge badge-danger'> Inactive</label> @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Description </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body" style="height: 120px; overflow-x: scroll; width: 100%; word-break: break-word; text-align: justify">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div><!--card-->
@endsection
