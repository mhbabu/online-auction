@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-edit"></i> Edit Advertisement</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.settings.advertisements.update',\App\Libraries\Encryption::encodeId($advertisement->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
              <div class="col-md-6 form-group">
                  {!! Form::label('title','Title',['class'=>'required-star']) !!}
                  {!! Form::text('title',$advertisement->title,['class'=>$errors->has('title')?'form-control is-invalid':'form-control required','placeholder'=>'Title']) !!}
              </div>
              <div class="col-md-6 form-group">
                  {!! Form::label('link','Link',['class'=>'required-star']) !!}
                  {!! Form::text('link',$advertisement->link,['class'=>$errors->has('link')?'form-control is-invalid':'form-control required','placeholder'=>'Link']) !!}
              </div>
              <div class="col-md-6 form-group">
                  {!! Form::label('expired_date','Expired Date',['class'=>'required-star']) !!}
                  {!! Form::date('expired_date',$advertisement->expired_date,['class'=>$errors->has('expired_date')?'form-control is-invalid':'form-control required','min' => \Carbon\Carbon::now()->addDay()->format('Y-m-d')]) !!}
              </div>
              <div class="col-md-6 form-group">
                  {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                  {!! Form::select('status',[1=>'Active',0=>'Inactive'],$advertisement->status,['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
              </div>
              <div class="col-md-12 form-group">
                  {!! Form::label('description','Description',['class'=>'required-star']) !!}
                  {!! Form::textarea('description',$advertisement->description,['class'=>$errors->has('description')?'form-control is-invalid':'form-control required','rows'=>'5','placeholder'=>'Description']) !!}
              </div>
                <div class="col-md-12 form-group">
                    {{ Form::label('image', 'Image :',['class'=>'required-star']) }}
                    <br/>
                    <label class="btn btn-default btn-sm">
                        {!! Form::file("image",['class'=> !($advertisement->CheckImageExist) ? 'required' : '']) !!}
                    </label>
                </div>
                <div class="col-md-12 form-group">
                   <img class="w-25 h-75" src="{{ $advertisement->ImagePath }}" alt="slider image">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.settings.advertisements.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
        {!! Form::close() !!}
    </div><!--card-->
@endsection
@section('footer-script')
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
