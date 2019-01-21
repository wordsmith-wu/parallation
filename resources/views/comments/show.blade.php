@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Comment / Show #{{ $comment->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('comments.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('comments.edit', $comment->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Paragraph_id</label>
<p>
	{{ $comment->paragraph_id }}
</p> <label>User_id</label>
<p>
	{{ $comment->user_id }}
</p> <label>Comment</label>
<p>
	{{ $comment->comment }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
