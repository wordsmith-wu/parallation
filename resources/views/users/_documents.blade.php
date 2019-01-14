@if (count($documents))

  <ul class="list-group mt-4 border-0">
    @foreach ($documents as $document)
      <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 @if($loop->first) border-top-0 @endif">
        <a href="{{ route('documents.show', $document->id) }}">
          {{ $document->title }}
        </a>
        <span class="meta float-right text-secondary">
          {{ $document->paragraphs_count }} 翻译
          <span> ⋅ </span>
          {{ $document->created_at->diffForHumans() }}
        </span>
      </li>
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
  {!! $documents->render() !!}
</div>