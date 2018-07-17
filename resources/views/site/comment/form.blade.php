


        {!! Form::open(['route' => ['comments.store'], 'id'=>'myform', 'data-parsley-remote' => '' , 'method' => 'POST']) !!}
        <div class="media media-post">
            <a class="author float-left" href="#pablo">
                <div class="avatar">
                    <img class="media-object" alt="{!! Auth::user()->username !!}" src="{{ url(Auth::user()->avatar) }}">
                </div>
            </a>
            <div class="media-body">
                <div class="form-group{{ $errors->has('comment') ? ' is-invalid' : '' }} label-floating bmd-form-group">
                    <label class="form-control-label bmd-label-floating" for="exampleBlogPost"> Post your comment...</label>
                    <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" rows="5" id="exampleBlogPost" minLength="3" required></textarea>
                    @if ($errors->has('comment'))
                    <span class="invalid-feedback">
                       <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="media-footer">

                    <button class="btn btn-{!! $color->slug !!} btn-raised btn-round float-right send" type="submit">
                      <span class="btn-label">
                        <i class="material-icons">forum</i>
                      </span>
                        Post Comment
                    </button>
                </div>
            </div>
        </div>
        {!! Form::hidden('event_id', $event->id) !!}
        {!! Form::close() !!}
