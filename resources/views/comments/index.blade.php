@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Comment
          <a class="btn btn-success float-xs-right" href="{{ route('comments.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($comments->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Paragraph_id</th> <th>User_id</th> <th>Comment</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($comments as $comment)
              <tr>
                <td class="text-xs-center"><strong>{{$comment->id}}</strong></td>

                <td>{{$comment->paragraph_id}}</td> <td>{{$comment->user_id}}</td> <td>{{$comment->comment}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('comments.show', $comment->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('comments.edit', $comment->id) }}">
                    E
                  </a>

                  <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $comments->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
