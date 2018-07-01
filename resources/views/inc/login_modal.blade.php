<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">

                    <div class="card-header card-header-warning text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                        <h4 class="card-title">Connexion</h4>
                        <div class="social-line">
                            <a href="#pablo" class="btn btn-just-icon btn-google btn-round"  data-placement="bottom" data-container="body">
                                <i class="fab fa-google-plus"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-twitter btn-round"  data-placement="bottom" data-container="body">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-facebook btn-round"  data-placement="bottom" data-container="body">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{route('login')}}" accept-charset="UTF-8" method="POST">
                        @csrf
                        <p class="description text-center">Ou </p>
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                                    </div>
                                    <input type="text" class="form-control{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}" id="username" name="username" placeholder="Email or Pseudo"  value="{{ old('username') }}" required autofocus>
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                    </div>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password..." name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong class="text-center">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <a class="text-warning" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                                </div>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"  checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Restez connecte') }}
                                    <span class="form-check-sign">
                                       <span class="check"></span>
                                 </span>
                                </label>
                            </div>
                        </div>
                        <div class="submit text-center">
                            <button class="btn btn-warning btn-raised" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">fingerprint</i>
                                          </span>
                                Connexion
                            </button>
                        </div>
                        <div class="text-left">
                            <span>Nouveau chez <b>{{ config('app.name') }}?</b> </span>
                            <a class="text-info" href="{{ route('register') }}">{{ __('Inscris toi ici') }}</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
