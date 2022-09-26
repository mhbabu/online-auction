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
                    <h5><i class="fa fa-list-alt"></i> Product Categories</h5>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route('admin.product.categories.create') }}" class="btn btn-sm btn-success" title="Create new" data-original-title="Create New">
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
        $(document.body).on('click', '.action-delete', function (ev) {
            ev.preventDefault();
            let URL = $(this).attr('href');
            let redirectURL = "{{ route('admin.product.categories.index') }}";
            warnBeforeAction(URL, redirectURL);
        });
    </script>
@endsection
