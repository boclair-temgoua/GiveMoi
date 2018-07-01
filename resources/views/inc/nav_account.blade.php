

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'GiveMoi') }} </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">apps</i> Composant
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="../index.html" class="dropdown-item">
                            <i class="material-icons">layers</i> All Components
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                            <i class="material-icons">content_paste</i> Documentation
                        </a>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">view_day</i> Sections
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
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">view_carousel</i> A propos de GiveMoi
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="../examples/about-us.html" class="dropdown-item">
                            <i class="material-icons">account_balance</i> About Us
                        </a>
                        <a href="../examples/blog-posts.html" class="dropdown-item">
                            <i class="material-icons">view_quilt</i> Blog Posts
                        </a>
                        <a href="../examples/contact-us.html" class="dropdown-item">
                            <i class="material-icons">location_on</i> Contact Us
                        </a>
                    </div>
                </li>

                <!-- Authentication Links -->
                @guest
                <li class="dropdown nav-item">
                    <a href="{{ route('login') }}" class=" nav-link">
                        <i class="material-icons">fingerprint</i> {{__('Connexion')}}
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="{{ route('register') }}" class=" nav-link">
                        <i class="material-icons">add</i> {{ __('Ouvrire un compte')}}
                    </a>
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
                        <span class="notification">{{count(Auth::user()->unreadNotifications)}}</span>

                    </a>









                    <div class="dropdown-menu notification-body" style="height:200px; width:300px; overflow:scroll;" >


                        @foreach (Auth::user()->unreadNotifications as $notification)
                        <a class="dropdown-item" href="{{ route('events.show', $notification->data['event']['slug']) }}">
                            <i>{{ $notification->data["user"]["name"] }}</i> has commented in<b> {{ $notification->data["event"]["title"] }} </b>
                        </a>
                        @endforeach

                    </div>
                </li>




                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">

                        @if(Auth::user()->avatar)
                        <img src="{{ url(Auth::user()->avatar)  }}" alt="{{ Auth::user()->username }}"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> {{ Auth::user()->username }}
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
                        <a href="../sections.html#teams" class="dropdown-item">
                            <i class="material-icons">people</i> Teams
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="material-icons">settings</i> Paramètres
                        </a>
                        <a class="dropdown-item" href="{{ route('user.logout') }}">
                            <i class="material-icons">clear</i>{{ __('Deconnexion')}}
                        </a>
                    </div>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
