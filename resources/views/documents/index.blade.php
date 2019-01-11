@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Document
          <a class="btn btn-success float-xs-right" href="{{ route('documents.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($documents->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Body</th> <th>User_id</th> <th>Category_id</th> <th>Paragraphs_count</th> <th>Words_count</th> <th>Last_translator_id</th> <th>Order</th> <th>Slug</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($documents as $document)
              <tr>
                <td class="text-xs-center"><strong>{{$document->id}}</strong></td>

                <td>{{$document->title}}</td> <td>{{$document->body}}</td> <td>{{$document->user_id}}</td> <td>{{$document->category_id}}</td> <td>{{$document->paragraphs_count}}</td> <td>{{$document->words_count}}</td> <td>{{$document->last_translator_id}}</td> <td>{{$document->order}}</td> <td>{{$document->slug}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('documents.show', $document->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('documents.edit', $document->id) }}">
                    E
                  </a>

                  <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $documents->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
