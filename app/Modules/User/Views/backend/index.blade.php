@extends('backend.layouts.app')
@section('header-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/backend/dist/css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/backend/dist/css/buttons.dataTables.min.css') }}"/>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <span class="card-title"><i class="fa fa-users ml-3"></i> Users Management</span>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route('admin.users.create') }}"
                           class="btn btn-sm btn-success ml-1"
                           data-toggle="tooltip"
                           title="Create new user"
                           data-original-title="Create New">
                            <i class="fa fa-plus-circle"></i> Create
                        </a>
                    </div>
                </div><!--col-->
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

@section('footer-script')
    <script src="{{ asset('assets/backend/dist/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/dist/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/dist/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/dist/js/buttons.server-side.js') }}" type="text/javascript"></script>
    @if(isset($dataTable))
        {!! $dataTable->scripts() !!}
    @endif

    <script type="text/javascript">
        $(document.body).on('click','.deactivate-user',function(ev){
            ev.preventDefault();
            let URL = $(this).attr('href');
            let redirectURL = "{{ url('/admin/users') }}";
            warnBeforeAction(URL, redirectURL);
        });
    </script>
@endsection
