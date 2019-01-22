@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Term / Show #{{ $term->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('terms.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('terms.edit', $term->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Creation_id</label>
<p>
	{{ $term->creation_id }}
</p> <label>Change_id</label>
<p>
	{{ $term->change_id }}
</p> <label>Usagecount</label>
<p>
	{{ $term->usagecount }}
</p> <label>Source_language_id</label>
<p>
	{{ $term->source_language_id }}
</p> <label>Target_language_id</label>
<p>
	{{ $term->target_language_id }}
</p> <label>Source_text</label>
<p>
	{{ $term->source_text }}
</p> <label>Target_text</label>
<p>
	{{ $term->target_text }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
