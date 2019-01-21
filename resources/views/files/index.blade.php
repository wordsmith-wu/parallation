@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          File
          <a class="btn btn-success float-xs-right" href="{{ route('files.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($files->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Source_language_id</th> <th>Target_language_id</th> <th>Url</th> <th>Download_url</th> <th>Paragraphs_count</th> <th>Words_count</th> <th>Type</th> <th>User_id</th> <th>Project_id</th> <th>Status</th> <th>Completed</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($files as $file)
              <tr>
                <td class="text-xs-center"><strong>{{$file->id}}</strong></td>

                <td>{{$file->name}}</td> <td>{{$file->source_language_id}}</td> <td>{{$file->target_language_id}}</td> <td>{{$file->url}}</td> <td>{{$file->download_url}}</td> <td>{{$file->paragraphs_count}}</td> <td>{{$file->words_count}}</td> <td>{{$file->type}}</td> <td>{{$file->user_id}}</td> <td>{{$file->project_id}}</td> <td>{{$file->status}}</td> <td>{{$file->completed}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('files.show', $file->id) }}">
                    V
                  </a>


                  <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $files->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
