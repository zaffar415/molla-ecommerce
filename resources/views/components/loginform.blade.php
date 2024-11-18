

<div class="form-box">
    <div class="form-tab">
        <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
            </li>
        </ul>
        <div class="tab-content" id="tab-content-5">
            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="singin-email">Email address *</label>
                        <input type="email" class="form-control" id="singin-email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-group">
                        <label for="singin-password">Password *</label>
                        <input type="password" class="form-control" id="singin-password" name="password" value="{{ old('password') }}" autocomplete="current-password" required>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-footer">
                        <button type="submit" class="btn btn-outline-primary-2">
                            <span>LOG IN</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signin-remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                        </div><!-- End .custom-checkbox -->
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                        @endif
                    </div><!-- End .form-footer -->
                </form>
                <div class="form-choice">
                    <p class="text-center">or sign in with</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-login btn-g">
                                <i class="icon-google"></i>
                                Login With Google
                            </a>
                        </div><!-- End .col-6 -->
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-login btn-f">
                                <i class="icon-facebook-f"></i>
                                Login With Facebook
                            </a>
                        </div><!-- End .col-6 -->
                    </div><!-- End .row -->
                </div><!-- End .form-choice -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="register-name">Full Name *</label>
                        <input id="register-name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-group">
                        <label for="register-email">Your email address *</label>
                        <input type="email" class="form-control" id="register-email" name="email" value={{ old('email') }} required>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-group">
                        <label for="register-password">Password *</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">                                        
                        @error('password')
                            <span class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-group">
                        <label for="register-confirm-password">Confirm Password *</label>
                        <input id="register-confirm-password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                                        
                        @error('password_confirmation')
                            <span class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- End .form-group -->

                    <div class="form-footer">
                        <button type="submit" class="btn btn-outline-primary-2">
                            <span>SIGN UP</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .form-footer -->
                </form>
                <div class="form-choice">
                    <p class="text-center">or sign in with</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-login btn-g">
                                <i class="icon-google"></i>
                                Login With Google
                            </a>
                        </div><!-- End .col-6 -->
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-login  btn-f">
                                <i class="icon-facebook-f"></i>
                                Login With Facebook
                            </a>
                        </div><!-- End .col-6 -->
                    </div><!-- End .row -->
                </div><!-- End .form-choice -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .form-tab -->
</div><!-- End .form-box -->
