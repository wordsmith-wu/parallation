@if (count($files))
  <ul class="list-unstyled">
    @foreach ($files as $file)
      <li class="media">
<!--         <div class="media-left">
          <a href="{{ route('users.show', [$file->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="{{ $file->user->avatar }}" title="{{ $file->user->name }}">
          </a>
        </div> -->

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('files.show', [$file->id]) }}" title="{{ $file->title }}">
              {{ $file->name }}
            </a>
            <a class="float-right" href="{{ route('files.show', [$file->id]) }}">
              <span class="badge badge-secondary badge-pill"> {{ count($file->paragraphs) }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">

            <a class="text-secondary" href="#" title="{{ $file->project->name }}">
              <i class="far fa-folder"></i>
              {{ $file->project->name }}
            </a>

            <span> • </span>
            <a class="text-secondary" href="{{ route('users.show', [$file->user_id]) }}" title="{{ $file->user->name }}">
              <i class="far fa-user"></i>
              {{ $file->user->name }}
            </a>
            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃于：{{ $file->updated_at }}">{{ $file->updated_at->diffForHumans() }}</span>
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