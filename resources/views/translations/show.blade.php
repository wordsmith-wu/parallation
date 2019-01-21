@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Translation / Show #{{ $translation->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('translations.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('translations.edit', $translation->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Creation_id</label>
<p>
	{{ $translation->creation_id }}
</p> <label>Change_id</label>
<p>
	{{ $translation->change_id }}
</p> <label>Usagecount</label>
<p>
	{{ $translation->usagecount }}
</p> <label>Source_language</label>
<p>
	{{ $translation->source_language }}
</p> <label>Target_language</label>
<p>
	{{ $translation->target_language }}
</p> <label>Source</label>
<p>
	{{ $translation->source }}
</p> <label>Target</label>
<p>
	{{ $translation->target }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
