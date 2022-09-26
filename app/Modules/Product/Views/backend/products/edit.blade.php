@extends('backend.layouts.app')
@section('header-css')
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-datetimepicker-standalone.css') !!}
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-datetimepicker2.min.css') !!}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-edit"></i> Edit Product</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.products.update',\App\Libraries\Encryption::encodeId($product->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('title','Title',['class'=>'required-star']) !!}
                    {!! Form::text('title',$product->title,['class'=>'required form-control '.($errors->has('title')?'is-invalid':''),'placeholder'=>'Title']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('category_id','Category',['class'=>'required-star']) !!}
                    {!! Form::select('category_id',$categories,$product->category_id,['class'=>'required form-control '.($errors->has('category_id')?'is-invalid':''),'placeholder'=>'Select Category']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('type_id','Type',['class'=>'required-star']) !!}
                    {!! Form::select('type_id',$types,$product->type_id,['class'=>'required form-control '.($errors->has('type_id')?'is-invalid':''),'placeholder'=>'Select Type']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('slug','Slug',['class'=>'required-star']) !!}
                    {!! Form::text('slug',$product->slug,['class'=>'required form-control slug '.($errors->has('slug')?'is-invalid':''),'placeholder'=>'Slug']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('price','Price',['class'=>'required-star']) !!}
                    {!! Form::number('price',$product->price,['class'=>$errors->has('price')?'form-control is-invalid':'form-control required','placeholder'=>'Price']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('end_time','End Time',['class'=>'required-star']) !!}
                    {!! Form::text('end_time',$product->end_time,['class'=>$errors->has('end_time')?'form-control is-invalid':'form-control required','placeholder'=>'YYYY-MM-DD HH-II','id'=>'endTime','autocomplete'=>'off']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],$product->status,['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('description','Long Description',['class'=>'required-star']) !!}
                    {!! Form::textarea('description',$product->description,['class'=>$errors->has('description')?'form-control is-invalid':'form-control required','rows'=>'5','placeholder'=>'Enter your description']) !!}
                </div>
            </div>
            @include('backend.includes.photo-html')
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
        {!! Form::close() !!}
    </div><!--card-->
@endsection
@section('footer-script')
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap-timepicker.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/moment.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap-datetimepicker2.min.js') !!}

    <script type="text/javascript">
        /********************
         PHOTO DELETE HERE
         ********************/
        $(document.body).on('click','.action-delete',function(ev){
            ev.preventDefault();
            let URL = $(this).attr('href');
            let redirectURL = "{{ route('admin.products.edit',\App\Libraries\Encryption::encodeId($product->id)) }}";
            warnBeforeAction(URL, redirectURL);
        });

        $(document).ready(function () {
            /**********************
             VALIDATION START HERE
             **********************/
            $('#dataForm').validate({
                errorPlacement: function () {
                    return false;
                }
            });
        });

        /****************************
         DATE TIME PICKER START HERE
         ***************************/
        $('#endTime').datetimepicker({
            format: 'YYYY-MM-DD h:sa', //H:s international time // H:sa  or h:s local time
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                previous:"fa fa-angle-left",
                next:"fa fa-angle-right"
            }
        });

        /****************************
         GENERATE SLUG START HERE
         ***************************/
        function slugConvert(Text){
            return Text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        }
        function convertToSlug(Text) {
            return  Text.trim().replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '').toLowerCase();
        }

        $(document).ready(function(){
            $('.title').keyup(function(){
                let slugText = $(this).val();
                $('.slug').val(convertToSlug(slugText));
            });
            $('.slug').keyup(function(){
                let slugText = $(this).val();
                $(this).val(slugConvert(slugText));
            });
        });
    </script>
@endsection
