@extends('layouts.app')

@section('title', '文件列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card ">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
<!--           <li class="nav-item"><a class="nav-link active" href="#">最后回复</a></li>
          <li class="nav-item"><a class="nav-link" href="#">最新发布</a></li> -->
          <li class="nav-item"><a class="nav-link active" href="{{ route('files.create') }}">上传文件</a></li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 文件列表 --}}
        @include('files._file_list', ['files' => $files])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $files->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('files._sidebar')
  </div>
</div>

@endsection