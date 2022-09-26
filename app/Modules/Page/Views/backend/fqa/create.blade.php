@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-plus-square"></i> Add FQA</h5>
            </div>
        </div>
        {!! Form::open(['route'=>'admin.fqas.store', 'method'=>'post','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {!! Form::label('question','Question',['class'=>'required-star']) !!}
                    {!! Form::text('question','',['class'=>$errors->has('question')?'form-control is-invalid':'form-control required','placeholder'=>'Question']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('answer','Answer',['class'=>'required-star']) !!}
                    {!! Form::textarea('answer','',['class'=>$errors->has('answer')?'form-control is-invalid':'form-control required','rows'=>'6','placeholder'=>'Answer']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],'',['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.fqas.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
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
