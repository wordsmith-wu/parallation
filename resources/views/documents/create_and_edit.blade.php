@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Document /
          @if($document->id)
            Edit #{{ $document->id }}
          @else
            Create
          @endif
        </h1>
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
                	<label for="body-field">Body</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $document->body ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $document->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="category_id-field">Category_id</label>
                    <input class="form-control" type="text" name="category_id" id="category_id-field" value="{{ old('category_id', $document->category_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="paragraphs_count-field">Paragraphs_count</label>
                    <input class="form-control" type="text" name="paragraphs_count" id="paragraphs_count-field" value="{{ old('paragraphs_count', $document->paragraphs_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="words_count-field">Words_count</label>
                    <input class="form-control" type="text" name="words_count" id="words_count-field" value="{{ old('words_count', $document->words_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="last_translator_id-field">Last_translator_id</label>
                    <input class="form-control" type="text" name="last_translator_id" id="last_translator_id-field" value="{{ old('last_translator_id', $document->last_translator_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $document->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $document->slug ) }}" />
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
