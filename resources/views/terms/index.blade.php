@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Term
          <a class="btn btn-success float-xs-right" href="{{ route('terms.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($terms->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Creation_id</th> <th>Change_id</th> <th>Usagecount</th> <th>Source_language_id</th> <th>Target_language_id</th> <th>Source_text</th> <th>Target_text</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($terms as $term)
              <tr>
                <td class="text-xs-center"><strong>{{$term->id}}</strong></td>

                <td>{{$term->creation_id}}</td> <td>{{$term->change_id}}</td> <td>{{$term->usagecount}}</td> <td>{{$term->source_language_id}}</td> <td>{{$term->target_language_id}}</td> <td>{{$term->source_text}}</td> <td>{{$term->target_text}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('terms.show', $term->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('terms.edit', $term->id) }}">
                    E
                  </a>

                  <form action="{{ route('terms.destroy', $term->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $terms->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
