@if(Auth::user()->id !== $item->id)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $item->name }}</h3>
            </div>
            <div class="panel-body">
                <p>
                    <i class="fa fa-envelope-o">
                        {{ $item->email }}
                    </i>
                </p>
                <p>
                    <i class="fa fa-clock-o">
                        {{ $item->created_at }}
                    </i>
                </p>
            </div>
            <div class="panel-footer">
                @if(Auth::user()->isFollowing($item->id))
                    <a href="{{ route('user.follow.unfollow',$item->id) }}" class="btn btn-block btn-danger">
                        取消关注
                    </a>
                @else
                    <a href="{{ route('user.follow.follow',$item->id) }}" class="btn btn-block btn-success">
                        关注
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif