@extends('backend.layouts.app')
@section('header-css')
    {!! Html::style('/assets/backend/dist/css/bootstrap-datepicker3.css') !!}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fa fa-building"></i> Appearance</span>
        </div>
        <!-- /.card-header -->
        {!! Form::open(['route'=>'admin.settings.appearance.store', 'method'=>'post','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <fieldset class="border p-3">
                <legend class="w-auto"><i class="fa fa-info-circle"></i> Basic Information</legend>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('name','Name : ',['class'=>'required-star']) !!}
                            {!! Form::text('name',(isset($appearance->name))?$appearance->name:null,['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Name']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('email','Email Address : ',['class'=>'required-star']) !!}
                            {!! Form::email('email',(isset($appearance->email)?$appearance->email:null),['class'=>$errors->has('email')?'form-control is-invalid':'form-control required','placeholder'=>'Email address']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('phone','Phone : ',['class'=>'required-star']) !!}
                            {!! Form::text('phone',(isset($appearance->phone)?$appearance->phone:null),['class'=>$errors->has('phone')?'form-control is-invalid':'form-control required','placeholder'=>'Phone']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('website','Website : ',['class'=>'required-star']) !!}
                            {!! Form::text('website',(isset($appearance->website)?$appearance->website:null),['class'=>$errors->has('website')?'form-control is-invalid':'form-control required','placeholder'=>'Website']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description','About Us : ',['class'=>'required-star']) !!}
                            {!! Form::textarea('description',(isset($appearance->description)?$appearance->description:null),['class'=>$errors->has('description')?'form-control is-invalid':'form-control required','id'=>'aboutUs','placeholder'=>'About us','rows'=>'5']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address','Address : ',['class'=>'required-star']) !!}
                            {!! Form::textarea('address',(isset($appearance->address)?$appearance->address:null),['class'=>$errors->has('address')?'form-control is-invalid':'form-control required','placeholder'=>'Address','rows'=>'5']) !!}
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('logo', 'Logo :',['class'=>'required-star']) }}
                            <br/>
                            <div>
                                <img class="img img-responsive img-thumbnail" src="{{ (isset($appearance->logo)) ? url('/uploads/appearance/'.$appearance->logo): url('/assets/backend/img/photo.png') }}" id="photoViewer" height="100" width="120">
                            </div>
                            <label class="btn btn-block btn-secondary btn-sm border-0" style="width: 120px;">
                                <input onchange="changePhoto(this)" type="file" name="logo" style="display: none" required>
                                <i class="fa fa-image"></i> Browse
                            </label>
                            <span id="photo_err" class="text-danger" style="font-size: 16px;"></span>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border p-3 mt-4">
                <legend class="w-auto"><i class="fa fa-link"></i> Social Links</legend>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('facebook','Facebook : ') !!}
                            {!! Form::text('facebook',(isset($appearance->facebook)?$appearance->facebook:'#'),['class'=>$errors->has('facebook')?'form-control is-invalid':'form-control','placeholder'=>'Facebook']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('youtube','Youtube : ') !!}
                            {!! Form::text('youtube',(isset($appearance->youtube)?$appearance->youtube:'#'),['class'=>$errors->has('youtube')?'form-control is-invalid':'form-control','placeholder'=>'Youtube']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('instagram','Instagram : ') !!}
                            {!! Form::text('instagram',(isset($appearance->instagram)?$appearance->instagram:'#'),['class'=>$errors->has('instagram')?'form-control is-invalid':'form-control','placeholder'=>'Instagram']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('twitter','Twitter : ') !!}
                            {!! Form::text('twitter',(isset($appearance->twitter)?$appearance->twitter:'#'),['class'=>$errors->has('twitter')?'form-control is-invalid':'form-control','placeholder'=>'Twitter']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('linkedin','Linkedin : ') !!}
                            {!! Form::text('linkedin',(isset($appearance->linkedin)?$appearance->linkedin:'#'),['class'=>$errors->has('linkedin')?'form-control is-invalid':'form-control','placeholder'=>'Linkedin']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('google_plus','Google Plus : ') !!}
                            {!! Form::text('google_plus',(isset($appearance->google_plus)?$appearance->google_plus:'#'),['class'=>$errors->has('google_plus')?'form-control is-invalid':'form-control','placeholder'=>'Google Plus']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('pinterest','Pinterest : ') !!}
                            {!! Form::text('pinterest',(isset($appearance->pinterest)?$appearance->pinterest:'#'),['class'=>$errors->has('pinterest')?'form-control is-invalid':'form-control','placeholder'=>'Pinterest']) !!}
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('footer-script')
    {!! Html::script('/assets/backend/dist/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('assets/backend/dist/js/tinymce/tinymce.min.js') !!}
    <script type="text/javascript">
        function changePhoto(input) {
            if (input.files && input.files[0]) {
                $("#photo_err").html('');
                let mime_type = input.files[0].type;
                if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
                    $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                    return false;
                }
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoViewer').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        /********************
         VALIDATION START HERE
         ********************/
        $(document).ready(function () {
            $('#dataForm').validate({
                errorPlacement: function () {
                    return false;
                }
            });
        });

        /*********************
         RICH TEXT HERE
         *********************/
        tinymce.init({
            selector: '#aboutUs',
            height: 200,
            content_style: 'img {max-width: 100%;}',
            max_chars: 1000, // max. allowed chars
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            image_title: true,
            automatic_uploads: true,
//                    images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    if(Math.round((this.files[0].size/1024)*100/100) > 200){
                        alert('Image size maximum 200KB');
                        return false
                    }else {
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                    }
                };
                input.click();
            }
        });
    </script>
@endsection
