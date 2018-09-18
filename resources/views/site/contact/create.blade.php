@extends('inc.app')
@section('title', '- Contact')
@section('style')
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
@endsection
@section('navbar')

@guest
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
@else
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{{ Auth::user()->color_name }}" color-on-scroll="100" id="sectionsNav">
@endguest
    @endsection
@section('content')
<div class="page-header header-filter header-small" data-parallax="true"
     style="background-image: url(&apos;../assets/img/kit/bg2.jpg&apos;);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto text-center">
                <h1 class="title">
                    <b>Contact Us</b>
                </h1>
                <h4>Do you have any questions or comments? Use the form below to contact us (or send us an E-mail).</h4>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="row">
            <div class="col-md-5 ml-auto">
                <h2 class="title">
                    <b>Get in touch with us</b>
                </h2>
                <div class="description text-justify">
                    <p>You can contact us with anything related to our Products. We'll get in touch with you as soon as possible.</p>
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-warning">
                        <i class="material-icons">pin_drop</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Find us at the Office</h4>
                        <p> Bld Mihail Kogalniceanu, nr. 8,
                            <br> 16134 Genova, Italy
                        </p>
                    </div>
                    <div class="icon icon-rose">
                        <i class="material-icons">phone</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Give us a Call</h4>
                        <p> Boclair Temgoua / Randrin Nzeukang
                            <br> +39 3425712192 / +39 3296187465
                            <br> Lun - Ven, 8:00 - 22:00
                        </p>
                    </div>
                    <div class="icon icon-info">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">E-mail Contact</h4>
                        <a href="mailto:dasgivemoi@gmail.com" >
                            <p>onlineworldservices@gmail.com</p>
                        </a>
                    </div>
                    <div class="icon icon-success">
                        <i class="material-icons">business</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Legal Informations</h4>
                        <p> Online World Services Srl
                            <br> Siège Social : Milan / Italie
                            <br> IVA: 0000000000
                            <br> IBAN: xxx xxxx xxxxx xxxxxx
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <br>
                <div class="card card-contact">
                    <form id="RegisterValidation" accept-charset="UTF-8" action="{{ route('contact.store')}}"
                          method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @guest
                        <div class="card-header card-header-raised card-header-warning text-center">
                            <h4 class="card-title">
                                <i class="material-icons">call</i>
                                <h4 class="card-title">
                                    <b>Contact Us</b>
                                </h4>
                            </h4>
                        </div>
                        @else
                        <div class="card-header card-header-raised card-header-{{ Auth::user()->color_name }} text-center">
                            <h4 class="card-title">
                                <i class="material-icons">call</i>
                                <h4 class="card-title">
                                    <b>Contact Us</b>
                                </h4>
                            </h4>
                        </div>
                        @endguest

                        <div class="card-body">
                            <div class="submit text-center">
                                @include('inc.alert')
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Prenom*</label>
                                        <input type="text" class="form-control" name="lastname"
                                               value="{{ old('lastname') }}" minLength="3" maxlength="20" required
                                               autofocus>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Nom*</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" minLength="3" maxlength="20" required
                                               autofocus>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">youremail@example.com*</label>
                                        <input type="text" name="email" class="form-control"
                                               value="{{ old('email') }}" required>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" minLength="3"
                                               maxlength="15" value="{{ old('phone') }}">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Objet*</label>
                                        <input type="text" name="subject" class="form-control"
                                               value="{{ old('subject') }}" required minLength="3" maxlength="100">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">Your Message *</label>
                                <textarea rows="5" name="msg" class="form-control"
                                          style="height:200px;" required autofocus>{{ old('msg') }}</textarea>
                                <span class="material-input"></span>
                            </div>
                            <br>
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} text-center">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                  <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>
                            <div class="submit text-center">
                                @guest
                                <button class="btn btn-warning btn-raised btn-round" type="submit">
                                    <span class="btn-label">
                                        <i class="material-icons">drafts</i>
                                        </span>
                                   <b>Send Message</b>
                                </button>
                                @else
                                <button class="btn btn-{{ Auth::user()->color_name }} btn-raised btn-round" type="submit">
                                    <span class="btn-label">
                                        <i class="material-icons">drafts</i>
                                    </span>
                                   send
                                </button>
                                @endguest
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('inc._footer')
@endsection

@section('scripts')
@parent

    <script>
        var gear;
        var lastPosition;
        var refreshRate = 60; // fps; reduce for less overhead
        var animation = "rotate(*deg)"; // css style to apply [Wildcard is *]
        var link = 0.5; //what to multiply the scrollTop by

        function replace(){
            if(lastPosition != document.body.scrollTop){ // Prevents unnecessary recursion
                lastPosition = document.body.scrollTop; // updates the last position to current
                gear.style.transform = animation.replace("*", Math.round(lastPosition * link)); // applies new style to the gear
            }
        }

        function setup(){
            lastPosition = document.body.scrollTop;
            gear = document.querySelector(".gear");
            setInterval(replace, 1000 / refreshRate); // 1000 / 60 = 16.666... Invokes function "replace" to update for each frame
        }
        window.addEventListener("DOMContentLoaded", setup);

    </script>

@endsection
