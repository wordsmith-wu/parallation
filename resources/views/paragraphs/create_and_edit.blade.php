@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Paragraph /
          @if($paragraph->id)
            Edit #{{ $paragraph->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($paragraph->id)
          <form action="{{ route('paragraphs.update', $paragraph->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('paragraphs.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="file_id-field">File_id</label>
                    <input class="form-control" type="text" name="file_id" id="file_id-field" value="{{ old('file_id', $paragraph->file_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="content-field">Content</label>
                	<textarea name="content" id="content-field" class="form-control" rows="3">{{ old('content', $paragraph->content ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="source_language_id-field">Source_language_id</label>
                    <input class="form-control" type="text" name="source_language_id" id="source_language_id-field" value="{{ old('source_language_id', $paragraph->source_language_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="target_language_id-field">Target_language_id</label>
                    <input class="form-control" type="text" name="target_language_id" id="target_language_id-field" value="{{ old('target_language_id', $paragraph->target_language_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="translation-field">Translation</label>
                	<textarea name="translation" id="translation-field" class="form-control" rows="3">{{ old('translation', $paragraph->translation ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="translator_id-field">Translator_id</label>
                    <input class="form-control" type="text" name="translator_id" id="translator_id-field" value="{{ old('translator_id', $paragraph->translator_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="proofread_id-field">Proofread_id</label>
                    <input class="form-control" type="text" name="proofread_id" id="proofread_id-field" value="{{ old('proofread_id', $paragraph->proofread_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="flag-field">Flag</label>
                    <input class="form-control" type="text" name="flag" id="flag-field" value="{{ old('flag', $paragraph->flag ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('paragraphs.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
