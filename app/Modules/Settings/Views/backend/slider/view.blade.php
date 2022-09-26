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
                        <div class="col-lg-4 font-weight-bold"> Name </div>
                        <div class="col-lg-8"> {{ ($product->name)? $product->name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Title </div>
                        <div class="col-lg-8"> {{ ($product->title) ? $product->title : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Category </div>
                        <div class="col-lg-8"> {{ ($product->category_name) ? $product->category_name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Subcategory </div>
                        <div class="col-lg-8"> {{ ($product->subcategory_name) ? $product->category_name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Brand </div>
                        <div class="col-lg-8"> {{ ($product->brand_name) ? $product->brand_name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Sku </div>
                        <div class="col-lg-8"> {{ ($product->sku_name) ? $product->sku_name : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Price </div>
                        <div class="col-lg-8"> <span class="badge badge-success"> BDT {{( $product->price) ?  $product->price : '0' }} Tk</span> </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Slug </div>
                        <div class="col-lg-8"> {{ ($product->slug) ? $product->slug : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Size </div>
                        <div class="col-lg-8"> {{ ($product->size) ? $product->size : '-'  }} </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Color </div>
                        <div class="col-lg-8"> {{ ($product->color) ? $product->size : '-' }} </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Weight </div>
                        <div class="col-lg-8"> {{ ($product->weight) ? $product->weight: '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Tax </div>
                        <div class="col-lg-8"> {{ ($product->tax) ? $product->tax : '-' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Featured Product </div>
                        <div class="col-lg-8"> {{ ($product->featured) ? 'Yes' : 'No' }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Total View </div>
                        <div class="col-lg-8"> <span class="badge badge-info"> {{ ($product->total_view) ? $product->total_view.(($product->total_view == 1)?' View':' Views') : 0 .' View' }}</span> </div>
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
                        <div class="col-lg-4 font-weight-bold"> Short Description </div>
                        <div class="col-lg-8">
                           <div class="card">
                               <div class="card-body" style="height: 120px; overflow-x: scroll; width: 100%; word-break: break-word; text-align: justify">
                                   {!! $product->short_description !!}
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Long Description </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body" style="height: 120px; overflow-x: scroll; width: 100%; word-break: break-word; text-align: justify">
                                    {!! $product->long_description !!}
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
