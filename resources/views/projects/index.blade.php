@extends('layouts.app')

@section('title','项目列表')

@section('content')


<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card ">

      <div class="card-header bg-transparent">
        <h1>
          项目
          <a class="btn btn-success float-xs-right" href="{{ route('projects.create') }}">创建</a>
        </h1>
      </div>

      <div class="card-body">
        {{--项目列表--}}
        @include('projects._project_list',['projects => $projects'])
        {{--分页--}}
        <div class="mt-5">
          {!! $projects->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('projects._sidebar')
  </div>

</div>



@endsection
