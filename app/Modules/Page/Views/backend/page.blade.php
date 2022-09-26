@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-plus-square"></i> {{ $page ? "Update $key Page " : "Add $key Page" }}</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.pages.update',$key), 'method'=>'POST','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {!! Form::label('body','Body',['class'=>'required-star']) !!}
                    {!! Form::textarea('body',$page ? $page->body : '',['class'=>$errors->has('body')?'form-control is-invalid':'form-control required','rows'=>'5','id' => 'description','placeholder'=>'Body']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],$page ? $page->status : '',['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> {{ $page ? 'Update' : 'Save' }} </button>
        </div>
        {!! Form::close() !!}
    </div><!--card-->
@endsection
@section('footer-script')
{!! Html::script('assets/backend/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('assets/backend/plugins/tinymce/tinymce.js') !!}>
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
    </script>
@endsection
