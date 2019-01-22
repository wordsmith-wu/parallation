@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Language
          <a class="btn btn-success float-xs-right" href="{{ route('languages.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($languages->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Code</th> <th>Description</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($languages as $language)
              <tr>
                <td class="text-xs-center"><strong>{{$language->id}}</strong></td>

                <td>{{$language->code}}</td> <td>{{$language->description}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('languages.show', $language->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('languages.edit', $language->id) }}">
                    E
                  </a>

                  <form action="{{ route('languages.destroy', $language->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $languages->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
