@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Comment /
          @if($comment->id)
            Edit #{{ $comment->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($comment->id)
          <form action="{{ route('comments.update', $comment->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('comments.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="paragraph_id-field">Paragraph_id</label>
                    <input class="form-control" type="text" name="paragraph_id" id="paragraph_id-field" value="{{ old('paragraph_id', $comment->paragraph_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $comment->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="comment-field">Comment</label>
                	<textarea name="comment" id="comment-field" class="form-control" rows="3">{{ old('comment', $comment->comment ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('comments.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
