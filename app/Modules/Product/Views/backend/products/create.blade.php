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
                <h5><i class="fa fa-plus-square"></i> Add Product</h5>
            </div>
        </div>
        {!! Form::open(['route'=>'admin.products.store', 'method'=>'post','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('title','Title',['class'=>'required-star']) !!}
                    {!! Form::text('title','',['class'=>'required form-control title '.($errors->has('title')?'is-invalid':''),'placeholder'=>'Title']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('category_id','Category',['class'=>'required-star']) !!}
                    {!! Form::select('category_id',$categories,'',['class'=>'required form-control '.($errors->has('category_id')?'is-invalid':''),'placeholder'=>'Select category']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('type_id','Type',['class'=>'required-star']) !!}
                    {!! Form::select('type_id',$types,'',['class'=>'required form-control '.($errors->has('type_id')?'is-invalid':''),'placeholder'=>'Select Type']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('slug','Slug',['class'=>'required-star']) !!}
                    {!! Form::text('slug','',['class'=>'required form-control slug '.($errors->has('slug')?'is-invalid':''),'placeholder'=>'Slug']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('price','Price',['class'=>'required-star']) !!}
                    {!! Form::number('price','',['class'=>$errors->has('price')?'form-control is-invalid':'form-control required','placeholder'=>'Price']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('end_time','End Time',['class'=>'required-star']) !!}
                    {!! Form::text('end_time','',['class'=>$errors->has('end_time')?'form-control is-invalid':'form-control required','placeholder'=>'YYYY-MM-DD HH-II','id'=>'endTime','autocomplete'=>'off']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],'',['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('description','Long Description',['class'=>'required-star']) !!}
                    {!! Form::textarea('description','',['class'=>$errors->has('description')?'form-control is-invalid':'form-control required','rows'=>'5','placeholder'=>'Enter your description']) !!}
                </div>
            </div>
            @include('backend.includes.photo-html')
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
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
