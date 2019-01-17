@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          项目 /
          @if($project->id)
            编辑 #{{ $project->id }}
          @else
            创建
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


          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          @include('shared._error')
          
                <div class="form-group">
                	<label for="name-field">项目名称</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $project->name ) }}" required />
                </div> 
                <div class="form-group">
                	<label for="description-field">项目描述</label>
                	<textarea name="description" id="description-field" class="form-control" rows="3">{{ old('description', $project->description ) }}</textarea>
                </div> 

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link float-xs-right" href="{{ route('projects.index') }}"> <- 返回</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
