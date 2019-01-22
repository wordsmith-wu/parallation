@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Term /
          @if($term->id)
            Edit #{{ $term->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($term->id)
          <form action="{{ route('terms.update', $term->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('terms.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="creation_id-field">Creation_id</label>
                    <input class="form-control" type="text" name="creation_id" id="creation_id-field" value="{{ old('creation_id', $term->creation_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="change_id-field">Change_id</label>
                    <input class="form-control" type="text" name="change_id" id="change_id-field" value="{{ old('change_id', $term->change_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="usagecount-field">Usagecount</label>
                    <input class="form-control" type="text" name="usagecount" id="usagecount-field" value="{{ old('usagecount', $term->usagecount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="source_language_id-field">Source_language_id</label>
                    <input class="form-control" type="text" name="source_language_id" id="source_language_id-field" value="{{ old('source_language_id', $term->source_language_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="target_language_id-field">Target_language_id</label>
                    <input class="form-control" type="text" name="target_language_id" id="target_language_id-field" value="{{ old('target_language_id', $term->target_language_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="source_text-field">Source_text</label>
                	<input class="form-control" type="text" name="source_text" id="source_text-field" value="{{ old('source_text', $term->source_text ) }}" />
                </div> 
                <div class="form-group">
                	<label for="target_text-field">Target_text</label>
                	<input class="form-control" type="text" name="target_text" id="target_text-field" value="{{ old('target_text', $term->target_text ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('terms.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
