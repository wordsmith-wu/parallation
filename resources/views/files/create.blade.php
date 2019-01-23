@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          创建文件
        </h1>
      </div>

      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-md-6">
                    <input id="file" type="file" class="" name="file" required>
                </div>
            </div>

            <div class="form-group">
              <label for="direction">请选择翻译方向</label>
              <select class="form-control" name="direction" required>
                <option value=0>中文-->英文</option>
                <option value=1>英文-->中文</option>
              </select>
            </div>

            <div class="form-group">
              <label for="project_id">请选择项目名称</label>
              <select class="form-control" name="project_id" required>
                @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
              </select>
            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-success">
                        上传
                    </button>
                    <a class="btn btn-link float-xs-right" href="{{ route('files.index') }}"> 返回</a>

                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
