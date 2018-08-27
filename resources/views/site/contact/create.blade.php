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

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
@section('content')
<div class="page-header header-filter header-small" data-parallax="true"
     style="background-image: url(&apos;../assets/img/kit/bg2.jpg&apos;);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h1 class="title">Contact Us</h1>
                @include('inc.alert')
                <h4>Questions ou commentaires? Utilisez le formulaire ci-après pour nous contacter (ou envoyez-nous
                    un e-mail).</h4>
                <h5 style="color:darkorange">Les champs avec <b>*</b> sont obligatoirent</h5>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br>
                <div class="card card-contact">


                    <form id="RegisterValidation" accept-charset="UTF-8" action="{{ route('contact.store')}}"
                          method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header card-header-raised card-header-warning text-center">
                            <h4 class="card-title">Contact Us</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @include('inc.alert')
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
                                        <label class="bmd-label-floating">Tel</label>
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
                                <label class="bmd-label-floating">Your message*</label>
                                <textarea rows="5" name="msg" class="form-control"
                                          style="height:200px;" required autofocus>{{ old('msg') }}</textarea>
                                <span class="material-input"></span>
                            </div>
                            <div class="submit text-center">
                                <button class="btn btn-warning btn-raised btn-round" type="submit">
                                          <span class="btn-label">
                                            <i class="material-icons">drafts</i>
                                          </span>
                                    Envoyer le message
                                </button>
                            </div>
                        </div>




                    </form>

                </div>
            </div>

            <div class="col-md-5 ml-auto">
                <h2 class="title">Entrer en contact</h2>
                <h5 class="description">Questions ou commentaires? Utilisez le formulaire ci-après pour nous
                    contacter (ou envoyez-nous un e-mail).</h5>
                <div class="info info-horizontal">
                    <div class="icon icon-warning">
                        <i class="material-icons">pin_drop</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Find us at the office</h4>
                        <p> Bld Mihail Kogalniceanu, nr. 8,
                            <br> 16134 Genova,
                            <br> Italy
                        </p>
                    </div>
                    <div class="icon icon-warning">
                        <i class="material-icons">phone</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Give us a ring</h4>
                        <p> Boclair Temgoua
                            <br> +39 3425712192
                            <br> Lun - Ven, 8:00-22:00
                        </p>
                    </div>
                    <div class="icon icon-warning">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Contact direct</h4>
                        <a href="mailto:temgoua2013@gmail.com" ><p>temgoua213@gmail.com</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc._footer')
@endsection

@section('scripts')
@parent
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_key') }}"></script>
<script type="text/javascript" charset="utf-8">
    $(function () {
        $('#form-contact-us').submit(function () {
            return submitForm($(this));
        });

        /**
         * Helper to submit the forms via ajax
         * @param form
         * @returns {boolean}
         */
        function submitForm($form) {
            var inputs = [];
            if (!FORM.validateForm($form, inputs)) {
                return false;
            }

            FORM.sendFormToServer($form, $form.serialize());
            return false;
        }

        var map = initGoogleMap('js-map-contact-us', -22.9666717, 14.5019224, 14);
//            addGoogleMapsMarker(map, -22.6228835, 17.0939617, false);
    });
</script>
@endsection
