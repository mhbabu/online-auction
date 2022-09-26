@extends('backend.layouts.app')
@section('header-css')
    {!! Html::style('/assets/backend/dist/css/bootstrap-datepicker3.css') !!}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fa fa-user ml-3"></i> User Profile</span>
        </div>

        <div class="card-body" style="padding-bottom: 0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Change Password</a>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent" style="padding-top: 0">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- /.card-header -->
                {!! Form::open(['route'=>'admin.profile.store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('name','Name : ') !!}
                                {!! Form::text('name',$user->name,['class'=>$errors->has('name')?'form-control is-invalid':'form-control','placeholder'=>'Name']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('country','Country Name : ') !!}
                                {!! Form::text('country',$user->country,['class'=>$errors->has('country')?'form-control is-invalid':'form-control','placeholder'=>'Country name']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('nationality','Nationality : ') !!}
                                {!! Form::text('nationality',$user->nationality,['class'=>$errors->has('nationality')?'form-control is-invalid':'form-control','placeholder'=>'Nationality']) !!}
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
                                {!! Form::text('company_name',$user->company_name,['class'=>$errors->has('company_name')?'form-control is-invalid':'form-control','placeholder'=>'company name']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('date_of_birth','Birth Date : ') !!}
                                {!! Form::text('date_of_birth',$user->date_of_birth,['class'=>$errors->has('date_of_birth')?'form-control is-invalid':'form-control','id'=>'birthDate','autocomplete'=>'off','placeholder'=>'yyyy-mm-dd']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('permanent_address','Permanent Address : ') !!}
                                {!! Form::textarea('permanent_address',$user->permanent_address,['class'=>$errors->has('permanent_address')?'form-control is-invalid':'form-control','placeholder'=>'Permanent address','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {{ Form::label('photo', 'Profile Image :') }}
                                <br/>
                                <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                                <div>
                                    @if(!empty($user->photo))
                                        <img class="img img-thumbnail img-bordered"
                                             src="{{ url('uploads/profile/'.$user->photo) }}" id="photoViewer"
                                             height="150" width="130">
                                    @else
                                        <img class="img img-responsive img-thumbnail"
                                             src="{{ url('assets/backend/img/photo.png') }}" id="photoViewer"
                                             height="150" width="130">
                                    @endif
                                </div>
                                <label class="btn btn-secondary btn-sm btn-block border-0">
                                    <input onchange="changePhoto(this)" type="file" name="photo"
                                           style="display: none">
                                    <i class="fa fa-image"></i> Browse
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
                    <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                {!! Form::open(['url'=>'admin/profile/change-password','method'=>'post','id'=>'PasswordChangeForm']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{ Form::label('old_password', 'Old password :',['class'=>'form-control-label col-md-4']) }}
                                <div class="col-md-7">
                                    {{ Form::password('old_password',['class'=>'form-control required','placeholder'=>'old password']) }}
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                {{ Form::label('new_password', 'New password :',['class'=>'form-control-label col-md-4']) }}
                                <div class="col-md-7">
                                    {{ Form::password('new_password',['class'=>'form-control required','placeholder'=>'new password']) }}
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                {{ Form::label('confirm_new_password', 'Confirm new password :',['class'=>'form-control-label col-md-4']) }}
                                <div class="col-md-7">
                                    {{ Form::password('confirm_new_password',['class'=>'form-control required','placeholder'=>'confirm new password']) }}
                                </div><!--col-->
                            </div><!--form-group-->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
                    <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
                {!! Form::close() !!}
            </div>
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
                if(!(mime_type=='image/jpeg' || mime_type=='image/jpg' || mime_type=='image/png')){
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

            var url = document.location.toString();
            if (url.match('#')) {
                $('.nav-pills a[href="#' + url.split('#')[1] + '"]').tab('show');
                $('.nav-tabs a').removeClass('active');
            }
        });
    </script>
@endsection
