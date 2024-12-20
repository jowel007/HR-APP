<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Human Resource</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('public/backend') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public/backend') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('public/backend') }}/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('public/backend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('public/backend') }}/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ url('public/backend') }}/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Registration</h4></div>



                        <div class="card-body">
                            <form method="POST" action="{{ url('register_post') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" onblur="duplcateEmail(this)" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="{{ url('forgot-password') }}" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Confirm Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="confirm_password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your Confirm password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        You have an account? <a href="{{ url('/') }}">Sign In</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ url('public/backend') }}/assets/modules/jquery.min.js"></script>
<script src="{{ url('public/backend') }}/assets/modules/popper.js"></script>
<script src="{{ url('public/backend') }}/assets/modules/tooltip.js"></script>
<script src="{{ url('public/backend') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('public/backend') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{ url('public/backend') }}/assets/modules/moment.min.js"></script>
<script src="{{ url('public/backend') }}/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ url('public/backend') }}/assets/js/scripts.js"></script>
<script src="{{ url('public/backend') }}/assets/js/custom.js"></script>


<script>
    function duplcateEmail(elemant){
        var email = $(elemant).val();
        // alert(email);
        $.ajax({
            type: 'POST',
            url: "{{ url('checkemail') }}",
            data: {
                email:email,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (res) {
                if (res.exists) {
                    $('.duplicate_message').html("this email is already Taken");
                }else{
                    $('.duplicate_message').html("");
                }
            },
            error:function (jqXHR, exception) {

            }
        })
    }
</script>


</body>
</html>
