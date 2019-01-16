@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-8 offset-md-2">

    <div class="card">
      <div class="card-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 上传文件
        </h4>
      </div>

      <div class="card-body">

          <form action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" id="fileupload" name="fname" accept=".json" onchange="onFileChange(this)">
            <div class="well well-sm">
              <button type="submit" class="btn btn-primary">生成报告</button>
            </div>
          </form>


        </form>
      </div>
    </div>
  </div>
</div>

@endsection