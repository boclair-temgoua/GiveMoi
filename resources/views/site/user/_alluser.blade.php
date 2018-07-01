
        <div class="media-area">
            @foreach($users as $user)
            @if(auth()->user()->id !== $user->id)
            <div class="media">
                <a class="float-left" href="{{ route('/', $user->username) }}">
                    <div class="avatar">
                        <img class="media-object" src="{{ url($user->avatar)  }}" alt="...">
                    </div>
                </a>
                <div class="media-body">
                    <a href="{{ route('/', $user->username) }}">
                        <h4 class="media-heading">{{ $user->name }}</h4>
                    </a>
                    <small>
                        <a href="{{ route('/@{username}/followers',$user->username) }}" class="text-dark">
                            Followed by
                        </a><b>{{ $user->followers()->get()->count() }}</b>
                        {{ str_plural('people', $user->followers->count()) }}
                    </small>

                    <h6 class="text-muted"></h6>
                    <p>{!! htmlspecialchars_decode($user->body) !!}</p>
                    <div class="media-footer">
                        <button class="btn btn-instagram btn-round follow float-right"  data-id="{{ $user->id }}">
                            <strong>
                                @if(auth()->user()->isFollowing($user))
                                UnFollow
                                @else
                                Follow
                                @endif
                            </strong>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>


        {{ $users->links() }}