@if (count($documents))
  <ul class="list-unstyled">
    @foreach ($documents as $document)
      <li class="media">
        <div class="media-left">
          <a href="{{ route('users.show', [$document->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="{{ $document->user->avatar }}" title="{{ $document->user->name }}">
          </a>
        </div>

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('documents.show', [$document->id]) }}" title="{{ $document->title }}">
              {{ $document->title }}
            </a>
            <a class="float-right" href="{{ route('documents.show', [$document->id]) }}">
              <span class="badge badge-secondary badge-pill"> {{ $document->paragraphs_count }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">

            <a class="text-secondary" href="{{ route('categories.show',$document->category_id) }}" title="{{ $document->category->name }}">
              <i class="far fa-folder"></i>
              {{ $document->category->name }}
            </a>

            <span> • </span>
            <a class="text-secondary" href="{{ route('users.show', [$document->user_id]) }}" title="{{ $document->user->name }}">
              <i class="far fa-user"></i>
              {{ $document->user->name }}
            </a>
            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃于：{{ $document->updated_at }}">{{ $document->updated_at->diffForHumans() }}</span>
          </small>

        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif