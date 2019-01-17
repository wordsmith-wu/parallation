@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Project / Show #{{ $project->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('projects.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('projects.edit', $project->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $project->name }}
</p> <label>Description</label>
<p>
	{{ $project->description }}
</p> <label>User_id</label>
<p>
	{{ $project->user_id }}
</p> <label>Order</label>
<p>
	{{ $project->order }}
</p> <label>Slug</label>
<p>
	{{ $project->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
