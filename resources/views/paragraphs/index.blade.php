@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          待翻译段落
        </h1>
      </div>

      <div class="card-body">
        @if($paragraphs->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">编号</th>
                <th>原文</th> 
                <th>翻译方向</th> 
                <th>译文</th> 
                <th class="text-xs-right">操作</th>
              </tr>
            </thead>

            <tbody>
              @foreach($paragraphs as $paragraph)
              <tr>
                <td class="text-xs-center"><strong>{{$paragraph->id}}</strong></td>

                <td>{{$paragraph->content}}</td> 
                <td>{{$paragraph->source_language_id==2?'中文-->英文':'英文-->中文'}}</td> 
                <td>
                    <form action="{{ route('paragraphs.update', $paragraph->id) }}" method="POST" style="display: inline;" accept-charset="UTF-8">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <input class="form-control" type="text" name="translation" id="paragraph-translation-field" value="{{ old('translation', $paragraph->translation ) }}" />
                      <button type="submit" class="btn btn-sm">确认</button>
                    </form>
                </td> 


                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('paragraphs.show', $paragraph->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('paragraphs.edit', $paragraph->id) }}">
                    E
                  </a>

                  <form action="{{ route('paragraphs.destroy', $paragraph->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $paragraphs->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
