<footer id="footer">
    <div class="container">
        <div class="row">
            <hr>
            <!-- <div class="col-md-3 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Subscribe</h2>

                    {!! Form::open([ 'route' => 'subscribe.store', 'method' => 'POST' ]) !!}
                                <div class="form-group">
                                {{ Form::text('email', null, ['class' => 'form-control', 'required'=>'required','placeholder'=>'Email Id']) }}<br>
                                </div>
                                <div class="form-group">
                                {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
                                </div>

                    {!! Form::close() !!}

                </div>
            </div> -->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="footer-navbar">
                            <li><a href="/">Home</a></li>
                            <li><a href="/blog">Stories</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/contact#advertise">Advertise</a></li>
                            <li><a href="/terms">Terms</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href="#">FOLLOW:</a></li>
                            <li><a target="_blank" title="Connect with Facebook" href="https://www.facebook.com/TweBox-688858734631797/"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" title="Connect with Twitter" href="https://twitter.com/BoxTwe"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" title="Connect with Google" href="https://plus.google.com/u/0/109363514153639612798"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="copyright-text text-center">
                    <p><a >&copy; twebox 2017. All Rights Reserved.</a></p>
                    <p><a target="_blank" href="/terms">Terms and conditions</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->