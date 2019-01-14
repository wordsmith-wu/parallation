@extends('layouts.app')

@section('title', isset($category)? $category->name : '文档列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 document-list">
  	@if (isset($category))
  		<div class="alert alert-info" role='alert'>
  			{{$category->name}} : {{ $category->description }}
  		</div>
  	@endif
    <div class="card ">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link {{ active_class( ! if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=default">最后翻译</a></li>
          <li class="nav-item"><a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a></li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 文档列表 --}}
        @include('documents._document_list', ['documents' => $documents])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $documents->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('documents._sidebar')
  </div>
</div>

@endsection