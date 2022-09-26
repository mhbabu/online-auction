@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa {{ $contactInfo ? 'fa-edit' : 'fa-plus-square' }}"></i> {{ $contactInfo ? 'Edit' : 'Add' }} Contact Info</h5>
            </div>
        </div>
        {!! Form::open(['route'=>'admin.contact-info.store', 'method'=>'post','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('phone','Phone : ',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::text('contactInfo[phone]',$contactInfo['phone'] ?? '',['class'=>$errors->has('contactInfo.phone') ? 'form-control is-invalid':'form-control required','placeholder'=>'Phone number']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('email','Email : ',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::text('contactInfo[email]',$contactInfo['email'] ?? '',['class'=>$errors->has('contactInfo.email') ? 'form-control is-invalid':'form-control required','placeholder'=>'Email']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('fax','Fax : ',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::text('contactInfo[fax]',$contactInfo['fax'] ?? '',['class'=>$errors->has('contactInfo.fax') ? 'form-control is-invalid':'form-control required','placeholder'=>'Fax']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('address','Address : ',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::textarea('contactInfo[address]',$contactInfo['address'] ?? '',['class'=>$errors->has('contactInfo.address') ? 'form-control is-invalid':'form-control required','rows'=>'2','placeholder'=>'Address']) !!}
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row col-sm">
                        <h5><i class="fas fa-poll-h"></i> Social Media</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            {!! Form::label('facebook','Facebook : ',['class'=>'font-weight-bold required-star']) !!}
                            {!! Form::text('contactInfo[facebook]',$contactInfo['facebook'] ?? '',['class'=>$errors->has('contactInfo.facebook') ? 'form-control is-invalid':'form-control required','placeholder'=>'Facebook Url']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('youtube','Youtube : ',['class'=>'font-weight-bold required-star']) !!}
                            {!! Form::text('contactInfo[youtube]',$contactInfo['youtube'] ?? '',['class'=>$errors->has('contactInfo.youtube') ? 'form-control is-invalid':'form-control required','placeholder'=>'Youtube Url']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row col-sm">
                        <h5><i class="fas fa-map"></i> Map</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            {!! Form::label('map','Map : ',['class'=>'font-weight-bold required-star']) !!}
                            {!! Form::textarea('contactInfo[map]',$contactInfo['map'] ?? '',['class'=>$errors->has('contactInfo.map') ? 'form-control is-invalid':'form-control required','rows' => '6','placeholder'=>'Map Url']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('status','Status : ',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],$status,['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
            </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> {{ $contactInfo ? 'Update' : 'Save' }} </button>
        </div>
        {!! Form::close() !!}
    </div><!--card-->
@endsection

@section('footer-script')
{!! Html::script('assets/backend/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('assets/backend/plugins/tinymce/general-tinymce.js') !!}>

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
