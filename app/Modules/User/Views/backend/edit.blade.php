@extends('backend.layouts.app')
@section('header-css')
    {!! Html::style('/assets/backend/dist/css/bootstrap-datepicker3.css') !!}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fa fa-user ml-3"></i> User Edit</span>
        </div>
        <!-- /.card-header -->
        {!! Form::open(['route'=>array('admin.users.update',\App\Libraries\Encryption::encodeId($user->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('name','Name : ',['class'=>'required-star']) !!}
                        {!! Form::text('name',$user->name,['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Name']) !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('designation','Designation : ') !!}
                        {!! Form::text('designation',$user->designation,['class'=>$errors->has('designation')?'form-control is-invalid':'form-control','placeholder'=>'Designation']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('company_name','Company Name : ') !!}
                        {!! Form::text('company_name',$user->company_name,['class'=>$errors->has('company_name')?'form-control is-invalid':'form-control','placeholder'=>'Company name']) !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('country','Country Name : ',['class'=>'required-star']) !!}
                        {!! Form::text('country',$user->country,['class'=>$errors->has('country')?'form-control is-invalid':'form-control required','placeholder'=>'Country name']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('nationality','Nationality : ',['class'=>'required-star']) !!}
                        {!! Form::text('nationality',$user->nationality,['class'=>$errors->has('nationality')?'form-control is-invalid':'form-control required','placeholder'=>'Nationality']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('date_of_birth','Birth Date : ',['class'=>'required-star']) !!}
                        {!! Form::text('date_of_birth',$user->date_of_birth,['class'=>$errors->has('date_of_birth')?'form-control is-invalid':'form-control required','id'=>'birthDate','placeholder'=>'yyyy-mm-dd','autocomplete'=>'off']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('permanent_address','Permanent Address : ',['class'=>'required-star']) !!}
                        {!! Form::textarea('permanent_address',$user->permanent_address,['class'=>$errors->has('permanent_address')?'form-control is-invalid':'form-control required','placeholder'=>'Permanent address','rows'=>'5']) !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('photo', 'Profile Image :',['class'=>'required-star']) }}
                        <br/>
                        <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                        <div>
                            <img class="img img-responsive img-thumbnail"
                                 src="{{ (!empty($user->photo)? url('/uploads/profile/'.$user->photo):url('/assets/backend/img/photo.png')) }}" id="photoViewer"
                                 height="150" width="130">
                        </div>
                        <label class="btn btn-block btn-secondary btn-sm border-0">
                            <input onchange="changePhoto(this)" type="file" name="photo"
                                   style="display: none" required>
                            <i class="fa fa-image"></i> Browse
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i>
                Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
        {!! Form::close() !!}
    </div>
    </div>

@endsection
@section('footer-script')
    {!! Html::script('/assets/backend/dist/js/bootstrap-datepicker.min.js') !!}
    <script type="text/javascript">
        function changePhoto(input) {
            if (input.files && input.files[0]) {
                $("#photo_err").html('');
                var mime_type = input.files[0].type;
                if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
                    $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoViewer').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('#birthDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            /********************
             VALIDATION START HERE
             ********************/
            $('#dataForm').validate({
                errorPlacement: function () {
                    return false;
                }
            });
        });
    </script>
@endsection
