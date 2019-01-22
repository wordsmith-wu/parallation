@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Language / Show #{{ $language->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('languages.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('languages.edit', $language->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Code</label>
<p>
	{{ $language->code }}
</p> <label>Description</label>
<p>
	{{ $language->description }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
