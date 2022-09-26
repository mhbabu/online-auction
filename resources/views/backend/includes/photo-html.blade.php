<div class="row">
    <div class="col-md-12">
        {{ Form::label('photo', 'Photo :',['class'=>'required-star']) }}
        <br/>
        <label class="btn btn-default btn-sm">
            {!! Form::file("photo[]",['multiple'=>'multiple','class'=>(isset($photos) && count($photos)>0)?'':'required']) !!}
        </label>
    </div>
    @if(isset($photos))
        @foreach($photos as $photo)
            <div class="col-md-1 pb-3 mt-3" style="position: relative">
                <a href="{{ route('admin.settings.photos.delete',\App\Libraries\Encryption::encodeId($photo->id)) }}" title="Delete Image" class="btn btn-danger btn-xs float-right action-delete" style="position: absolute; z-index: 100; right: 14px; top: 6px">
                    <i class="fa fa-times"></i>
                </a>
                <img class="col-md-12 img img-bordered" src="{{ url($photo->path) }}" height="100" width="100">
            </div>
        @endforeach
    @endif
</div>
