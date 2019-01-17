@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Project /
          @if($project->id)
            Edit #{{ $project->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($project->id)
          <form action="{{ route('projects.update', $project->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('projects.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $project->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<textarea name="description" id="description-field" class="form-control" rows="3">{{ old('description', $project->description ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $project->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $project->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $project->slug ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('projects.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
