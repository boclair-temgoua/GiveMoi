@section('navbar')
@show
<div class="container">
    <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/') }}"><b>{{ config('app.name', 'GiveMoi') }}</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="dropdown nav-item">
                <a href="/" class=" nav-link">
                    <i class="material-icons">home</i> <b>{{ __('Home')}}</b>
                </a>
            </li>
            <li class="dropdown nav-item">
                <a href="{{ route('about') }}" class=" nav-link">
                    <i class="material-icons">account_balance</i> <b>{{ __('About Us')}}</b>
                </a>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="material-icons">view_day</i> <b>{{__('Services')}}</b>
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                    <a href="../sections.html#headers" class="dropdown-item">
                        <i class="material-icons">dns</i> Headers
                    </a>
                    <a href="../sections.html#features" class="dropdown-item">
                        <i class="material-icons">build</i> Features
                    </a>
                    <a href="../sections.html#blogs" class="dropdown-item">
                        <i class="material-icons">list</i> Blogs
                    </a>
                    <a href="../sections.html#teams" class="dropdown-item">
                        <i class="material-icons">people</i> Teams
                    </a>
                    <a href="../sections.html#projects" class="dropdown-item">
                        <i class="material-icons">assignment</i> Projects
                    </a>
                    <a href="../sections.html#pricing" class="dropdown-item">
                        <i class="material-icons">monetization_on</i> Pricing
                    </a>
                    <a href="../sections.html#testimonials" class="dropdown-item">
                        <i class="material-icons">chat</i> Testimonials
                    </a>
                    <a href="../sections.html#contactus" class="dropdown-item">
                        <i class="material-icons">call</i> Contacts
                    </a>
                </div>
            </li>
            <li class="dropdown nav-item">
                <a href="{{ route('contact_us') }}" class=" nav-link">
                    <i class="material-icons">call</i> <b>{{ __('Contact Us')}}</b>
                </a>
            </li>

            <!-- Authentication Links -->
            @guest
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="material-icons">face</i> <b>{{__('Login')}}</b>
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                    <!--
                    <a href="{{ route('login') }}" class="dropdown-item"  data-toggle="modal" data-target="#loginModal">
                        <i class="material-icons">fingerprint</i> {{__('Sing in')}}
                    </a>
                    -->
                    <a href="{{ route('login') }}" class="dropdown-item" >
                        <i class="material-icons">fingerprint</i> <b>{{__('Sign in')}}</b>
                    </a>
                    <a href="{{ route('register') }}" class="dropdown-item" >
                        <i class="material-icons">person_add</i> <b>{{ __('Register')}}</b>
                    </a>
                </div>
            </li>
            @else
            <li class="dropdown nav-item">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">email</i>
                    <span class="notification">21</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">0</span>
                </a>
                <div class="dropdown-menu notification-body" style="height:200px; width:300px; overflow:scroll;" >
                    <a class="dropdown-item" href=" ">
                        <i> </i> has commented in<b>  </b>
                    </a>
                </div>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                    @if(Auth::user()->avatar)
                    <img src="{{ url(Auth::user()->avatar)  }}?{{ time() }}" alt="{{ Auth::user()->name }}"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> <b>{!! str_limit(Auth::user()->name, 12,'...') !!}</b>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                    <a href="../sections.html#headers" class="dropdown-item">
                        <i class="material-icons">dns</i> Headers
                    </a>
                    <a href="../sections.html#features" class="dropdown-item">
                        <i class="material-icons">build</i> Features
                    </a>
                    <a href="../sections.html#blogs" class="dropdown-item">
                        <i class="material-icons">list</i> Blogs
                    </a>
                    <a href="{{ route('/', Auth::user()->username) }}" class="dropdown-item">
                        <i class="material-icons">person</i> Profile
                    </a>
                    <a href="/account/profile" class="dropdown-item">
                        <i class="material-icons">settings</i> Paramètres
                    </a>
                    <a class="dropdown-item" href="{{ route('user.logout') }}">
                        <i class="material-icons">power_settings_new</i>{{ __('Deconnexion')}}
                    </a>
                </div>
            </li>
            @endguest

        </ul>
    </div>
</div>
</nav>
