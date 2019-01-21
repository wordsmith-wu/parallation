@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Translation
          <a class="btn btn-success float-xs-right" href="{{ route('translations.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($translations->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Creation_id</th> <th>Change_id</th> <th>Usagecount</th> <th>Source_language</th> <th>Target_language</th> <th>Source</th> <th>Target</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($translations as $translation)
              <tr>
                <td class="text-xs-center"><strong>{{$translation->id}}</strong></td>

                <td>{{$translation->creation_id}}</td> <td>{{$translation->change_id}}</td> <td>{{$translation->usagecount}}</td> <td>{{$translation->source_language}}</td> <td>{{$translation->target_language}}</td> <td>{{$translation->source}}</td> <td>{{$translation->target}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('translations.show', $translation->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('translations.edit', $translation->id) }}">
                    E
                  </a>

                  <form action="{{ route('translations.destroy', $translation->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $translations->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
