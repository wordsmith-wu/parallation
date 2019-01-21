@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Translation /
          @if($translation->id)
            Edit #{{ $translation->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($translation->id)
          <form action="{{ route('translations.update', $translation->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('translations.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="creation_id-field">Creation_id</label>
                    <input class="form-control" type="text" name="creation_id" id="creation_id-field" value="{{ old('creation_id', $translation->creation_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="change_id-field">Change_id</label>
                    <input class="form-control" type="text" name="change_id" id="change_id-field" value="{{ old('change_id', $translation->change_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="usagecount-field">Usagecount</label>
                    <input class="form-control" type="text" name="usagecount" id="usagecount-field" value="{{ old('usagecount', $translation->usagecount ) }}" />
                </div> 
                <div class="form-group">
                	<label for="source_language-field">Source_language</label>
                	<input class="form-control" type="text" name="source_language" id="source_language-field" value="{{ old('source_language', $translation->source_language ) }}" />
                </div> 
                <div class="form-group">
                	<label for="target_language-field">Target_language</label>
                	<input class="form-control" type="text" name="target_language" id="target_language-field" value="{{ old('target_language', $translation->target_language ) }}" />
                </div> 
                <div class="form-group">
                	<label for="source-field">Source</label>
                	<textarea name="source" id="source-field" class="form-control" rows="3">{{ old('source', $translation->source ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="target-field">Target</label>
                	<textarea name="target" id="target-field" class="form-control" rows="3">{{ old('target', $translation->target ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('translations.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
