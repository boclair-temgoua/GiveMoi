

<div class="subscribe-line">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="title">{{ config('app.name') }} &amp; Newsletter</h3>
                <p class="description">
                    <b>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles de
                        <strong>{{ config('app.name') }}</strong>
                    </b>
                </p>
            </div>
            <div class="col-md-8">
                <div class="card card-plain card-form-horizontal">
                    <div class="card-body">
                        <form id="form-newsletter-subscribe" method="post" action="/api/newsletter/subscribe">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                        </div>
                                        <input type="text" name="fullname" class="form-control" placeholder="Non complet...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                        </div>
                                        <input type="text" name="email" class="form-control" placeholder=" Email...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-round btn-block">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>















