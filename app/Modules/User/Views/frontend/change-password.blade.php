@extends('login.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fa fa-lock ml-3"></i> Change User Password</span>
        </div>
        <!-- /.card-header -->
        {!! Form::open(['url'=>'users/change-password-request/'.\App\Libraries\Encryption::encodeId($user->id),'method'=>'POST','id' => 'dataForm']) !!}

        <div class="card-body">
            <div class="row">
              <div class="col-md-6 form-group">
                    {!! Form::label('password','Password: ',['class'=>'required-star']) !!}
                    {!! Form::password('password',['class'=>$errors->has('password')?'form-control is-invalid':'form-control required','placeholder'=>'Password']) !!}
              </div>
              <div class="col-md-6 form-group">
                    {!! Form::label('password_confirmation','Confirm Password: ',['class'=>'required-star']) !!}
                    {!! Form::password('password_confirmation',['class'=>$errors->has('password_confirmation')?'form-control is-invalid':'form-control required','placeholder'=>'Confirm password']) !!}
              </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-warning"><i class="fa fa-backward"></i>Back</a>

            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
        {!! Form::close() !!}
    </div>
    </div>

@endsection
@section('footer-script')
    {!! Html::script('/assets/backend/dist/js/bootstrap-datepicker.min.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
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
