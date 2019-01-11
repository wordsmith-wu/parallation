@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Document / Show #{{ $document->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('documents.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('documents.edit', $document->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $document->title }}
</p> <label>Body</label>
<p>
	{{ $document->body }}
</p> <label>User_id</label>
<p>
	{{ $document->user_id }}
</p> <label>Category_id</label>
<p>
	{{ $document->category_id }}
</p> <label>Paragraphs_count</label>
<p>
	{{ $document->paragraphs_count }}
</p> <label>Words_count</label>
<p>
	{{ $document->words_count }}
</p> <label>Last_translator_id</label>
<p>
	{{ $document->last_translator_id }}
</p> <label>Order</label>
<p>
	{{ $document->order }}
</p> <label>Slug</label>
<p>
	{{ $document->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
