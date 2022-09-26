@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-edit"></i> Edit Slider</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.settings.sliders.update',\App\Libraries\Encryption::encodeId($slider->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('title','Title',['class'=>'required-star']) !!}
                    {!! Form::text('title',$slider->title,['class'=>$errors->has('title')?'form-control is-invalid':'form-control required','placeholder'=>'Title']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],$slider->status,['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('btn_name','Button Name',['class'=>'required-star']) !!}
                    {!! Form::text('btn_name',$slider->btn_name,['class'=>$errors->has('btn_name')?'form-control is-invalid':'form-control required','placeholder'=>'Button name']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('btn_link','Button Link',['class'=>'required-star']) !!}
                    {!! Form::text('btn_link',$slider->btn_link,['class'=>$errors->has('btn_link')?'form-control is-invalid':'form-control required','placeholder'=>'Button link']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('description','Description',['class'=>'required-star']) !!}
                    {!! Form::textarea('description',$slider->description,['class'=>$errors->has('description')?'form-control is-invalid':'form-control required','rows'=>'5','placeholder'=>'Description']) !!}
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::hidden('image',$slider->image) !!}

                        {{ Form::label('image', 'Image :',['class'=>'required-star']) }}
                        <br/>
                        <div>
                            <img class="img img-thumbnail" src="{{ (!empty($slider->image)? url('/uploads/setting/slider/'.$slider->image):url('/assets/backend/img/photo.png')) }}" id="photoViewer" height="100" width="120">
                        </div>
                        <label class="btn btn-block btn-secondary btn-sm border-0" style="width: 120px;">
                            <input onchange="changePhoto(this)" type="file" name="image" style="display: none" required>
                            <i class="fa fa-image"></i> Browse
                        </label>
                        <span id="photo_err" class="text-danger" style="font-size: 16px;"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.settings.sliders.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
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
