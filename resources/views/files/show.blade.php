@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>文件 / 显示 #{{ $file->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('files.index') }}">返回</a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $file->name }}
</p> <label>Source_language</label>
<p>
	{{ $file->source_language }}
</p> <label>Target_language</label>
<p>
	{{ $file->target_language }}
</p> <label>Url</label>
<p>
	{{ $file->url }}
</p> <label>Download_url</label>
<p>
	{{ $file->download_url }}
</p> <label>Paragraphs_count</label>
<p>
	{{ $file->paragraphs_count }}
</p> <label>Words_count</label>
<p>
	{{ $file->words_count }}
</p> <label>Type</label>
<p>
	{{ $file->type }}
</p> <label>User_id</label>
<p>
	{{ $file->user_id }}
</p> <label>Project_id</label>
<p>
	{{ $file->project_id }}
</p> <label>Status</label>
<p>
	{{ $file->status }}
</p> <label>Completed</label>
<p>
	{{ $file->completed }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
