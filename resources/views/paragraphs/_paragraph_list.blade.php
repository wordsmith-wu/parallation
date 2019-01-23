@if (count($paragraphs))
<!--   <ul class="list-unstyled">
 -->

    <thead>
      <tr>
        <th class="text-xs-center">#</th>
        <th>File_id</th> <th>Content</th> <th>Source_language_id</th> <th>Target_language_id</th> <th>Translation</th> <th>Translator_id</th> <th>Proofread_id</th> <th>Flag</th>
        <th class="text-xs-right">OPTIONS</th>
      </tr>
    </thead>

    <tbody>

    @foreach ($paragraphs as $paragraph)

      <tr>
        <td class="text-xs-center"><strong>{{$paragraph->id}}</strong></td>

        <td>{{$paragraph->file_id}}</td> <td>{{$paragraph->content}}</td> <td>{{$paragraph->source_language_id}}</td> <td>{{$paragraph->target_language_id}}</td> <td>{{$paragraph->translation}}</td> <td>{{$paragraph->translator_id}}</td> <td>{{$paragraph->proofread_id}}</td> <td>{{$paragraph->flag}}</td>

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
<!--   </ul>
 -->
@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif