


<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/">
                {{ config('app.name', 'GiveMoi') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            @guest
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class=" nav-link">
                        <i class="fab fa-facebook-square fa-lg"></i> {{__('Se connecter rapidement avec Facebook')}}
                    </a>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <a href="{{ route('register') }}"  class="btn  btn-warning   btn-round btn-block">
                        {{ __('Ouvre ton compte ici')}}
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>



