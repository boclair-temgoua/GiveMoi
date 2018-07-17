

@include('inc.login_modal')
<footer class="footer footer-white footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="/">
                        <h5>{{ config('app.name') }}</h5>
                    </a>
                    <p>Probably the best UI Kit in the world! We know you&apos;ve been waiting for it, so don&apos;t be shy!</p>
                </div>
                <div class="col-md-2">
                    <h5>About</h5>
                    <ul class="links-vertical">
                        <li>
                            <a class="text-grey" href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a class="text-grey" href="#">
                                Testimonials
                            </a>
                        </li>
                        <li>
                            <a class="text-grey" href="#">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Market</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="{{ route('events') }}">
                                Events
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                How to Register
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Sell Goods
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Receive Payment
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Transactions Issues
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Legal</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="/terms_conditions">
                                Terms &amp; Conditions
                            </a>
                        </li>
                        <li>
                            <a href="/testimonial">
                                Testimonial
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                FAQS
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Subscribe to Newsletter</h5>
                    <p>
                        Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                    </p>
                    <form class="form form-newsletter" id="form-newsletter-subscribe" method="post" action="{{ route('newsletter.store') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <input id="user_email" type="text" name="user_email" class="form-control{{ $errors->has('user_email') ? ' has-error' : '' }}" placeholder=" Email..." required>
                            @if ($errors->has('user_email'))
                            <span class="help-block">
                                 <strong class="text-center">{{ $errors->first('user_email') }}</strong>
                             </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info btn-just-icon" name="submit">
                            <i class="material-icons">mail</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <ul class="social-buttons">
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-twitter btn-round" data-toggle="tooltip" title="Nous suivre sur Twitter" data-placement="bottom" data-container="body">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-facebook btn-round" data-toggle="tooltip" title="Nous suivre sur Facebook" data-placement="bottom" data-container="body">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-instagram btn-round" data-toggle="tooltip" title="Nous suivre sur Instagram" data-placement="bottom" data-container="body">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-google btn-round" data-toggle="tooltip" title="Nous suivre sur Youtube" data-placement="bottom" data-container="body">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        </ul>
        <div class="copyright pull-center">
            Copyright
            &copy; 2018 -
            <script>
                document.write(new Date().getFullYear())
            </script>, <i class="material-icons" style="color:red;">favorite</i>all rights reserved by
            <a href="/">{!! config('app.author') !!}</a>
        </div>
    </div>
</footer>




