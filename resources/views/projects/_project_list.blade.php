@if (count($projects))
  <ul class="list-unstyled">
    @foreach ($projects as $project)
      <li class="media">
        <div class="media-left">
          <a href="{{ route('users.show', [$project->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="{{ $project->user->avatar }}" title="{{ $project->user->name }}">
          </a>
        </div>

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('projects.show', [$project->id]) }}" title="{{ $project->name }}">
              {{ $project->name }}
            </a>
          </div>

          <small class="media-body meta text-secondary">
            <a class="text-secondary" href="{{ route('users.show', [$project->user_id]) }}" title="{{ $project->user->name }}">
              <i class="far fa-user"></i>
              {{ $project->user->name }}
            </a>
            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后更新于：{{ $project->updated_at }}">{{ $project->updated_at->diffForHumans() }}</span>
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