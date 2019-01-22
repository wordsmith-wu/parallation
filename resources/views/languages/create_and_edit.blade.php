@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Language /
          @if($language->id)
            Edit #{{ $language->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($language->id)
          <form action="{{ route('languages.update', $language->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('languages.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="code-field">Code</label>
                	<input class="form-control" type="text" name="code" id="code-field" value="{{ old('code', $language->code ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<input class="form-control" type="text" name="description" id="description-field" value="{{ old('description', $language->description ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('languages.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
