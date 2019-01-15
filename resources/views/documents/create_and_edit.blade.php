@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h2>
          <i class="far fa-edit"></i>
          @if($document->id)
            编辑文件 #{{ $document->id }}
          @else
            新建文件
          @endif
        </h2>
      </div>

      <div class="card-body">
        @if($document->id)
          <form action="{{ route('documents.update', $document->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('documents.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
	          <div class="form-group">
	          	<label for="title-field">Title</label>
	          	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $document->title ) }}" />
	          </div> 
	          <div class="form-group">
	            <select class="form-control" name="category_id" required>
	              <option value="" hidden disabled {{ $document->id ? '': 'selected' }} >请选择分类</option>
	              @foreach ($categories as $value)
	              <option value="{{ $value->id }}">{{ $value->name }}</option>
	              @endforeach
	            </select>
	          </div>
	          <div class="form-group">
	            <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $document->description ) }}</textarea>
	          </div>

	          <div class="well well-sm">
	            <button type="submit" class="btn btn-primary">Save</button>
	            <a class="btn btn-link float-xs-right" href="{{ route('documents.index') }}"> <- Back</a>
	          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
      });
    });
  </script>
@stop