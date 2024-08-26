

{{--@dd($user)--}}
<body class="register-page" style="min-height: 542px;">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            {{--                @dd($errors)--}}
            @foreach($errors->all() as $er)
                <p class="text-red font-weight-light">
                    {{ $er }}
                </p>

            @endforeach
            {{--                @error('first_name')--}}
            {{--                @enderror--}}

            <form action="/register" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="first_name" placeholder="First name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="last_name" placeholder="Last name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Select Role</label>
                    <select name="role" class="form-control">

                        @foreach(\App\RandomDataGenerator::typesOfRole() as $status)
                            <option value="{{$status}}">{{$status}}</option>
                        @endforeach

                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="/login" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


</body>

{{--    <body  class=" d-flex flex-column">--}}
{{--    <div class="page page-center">--}}
{{--        <div class="container container-tight ">--}}
{{--            <div class="text-center ">--}}
{{--                <a href="." class="navbar-brand navbar-brand-autodark">--}}
{{--                    <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <form class="card card-md" action="/register" method="post" autocomplete="off" novalidate>--}}
{{--                @csrf--}}
{{--                <div class="card-body">--}}
{{--                    <h2 class="card-title text-center mb-4">Create new Account</h2>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">First Name</label>--}}
{{--                        <input type="text"  class="form-control" name="first_name" placeholder="Jhon"  required>--}}

{{--                        @error('first_name')--}}
{{--                       <p class="text-red text-sm">--}}

{{--                        <p class="text-red text-sm">--}}
{{--                           {{ $message }}--}}
{{--                       </p>--}}
{{--                       </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Last Name</label>--}}
{{--                        <input type="text"  class="form-control" name="last_name" placeholder="Doe"  required>--}}

{{--                        @error('last_name')--}}

{{--                        <p class="text-red text-sm">--}}
{{--                           {{ $message }}--}}
{{--                       </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Email address</label>--}}
{{--                        <input type="email"  class="form-control" name="email" placeholder="jhondoe@xyz.com" required>--}}

{{--                        @error('email')--}}
{{--                        <p class="text-red text-sm">--}}
{{--                           {{ $message }}--}}
{{--                       </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Password</label>--}}
{{--                        <div class="input-group input-group-flat">--}}

{{--                            <input type="password"  class="form-control"  name="password" placeholder="Password"  autocomplete="off" required>--}}
{{--                        </div>--}}
{{--                        @error('password')--}}
{{--                        <p class="text-red text-sm">--}}
{{--                            {{ $message }}--}}
{{--                        </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Confirm Password</label>--}}
{{--                        <div class="input-group input-group-flat">--}}
{{--                            <input type="password"  class="form-control"  name="password_confirmation" placeholder="Password Confirmation"  autocomplete="off" required>--}}

{{--                            @error('password_confirmation')--}}
{{--                            <p class="text-red text-sm">--}}
{{--                           {{ $message }}--}}
{{--                       </p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <div class="form-label">Upload Profile Picture</div>--}}
{{--                        <input type="file" name="avatar" class="form-control" required>--}}

{{--                        @error('avatar')--}}
{{--                        <p class="text-red text-sm">--}}
{{--                            {{ $message }}--}}
{{--                        </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-check">--}}
{{--                            <input type="checkbox" name="agreed" class="form-check-input" required/>--}}
{{--                            <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>--}}
{{--                        </label>--}}

{{--                        @error('agreed')--}}
{{--                        <p class="text-red text-sm">--}}
{{--                           {{ $message }}--}}
{{--                       </p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}


{{--                    <div class="mb-3">--}}
{{--                        <div class="form-label">Specify Your Gender</div>--}}
{{--                        <div>--}}
{{--                            <label class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="radio" name="gender" >--}}
{{--                                <span class="form-check-label">Miss.</span>--}}
{{--                            </label>--}}
{{--                            <label class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="radio" name="gender">--}}
{{--                                <span class="form-check-label">Mr.</span>--}}
{{--                            </label>--}}
{{--                            <label class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="radio" name="ignored" disabled="">--}}
{{--                                <span class="form-check-label">Don't Answer</span>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-footer">--}}
{{--                        <button type="submit" class="btn btn-primary w-100">Create new account</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <div class="text-center text-secondary mt-3">--}}
{{--                Already have account? <a href="./sign-in.html" tabindex="-1">Sign in</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </body>--}}
