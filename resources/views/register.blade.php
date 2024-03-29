<!doctype html>
<html lang="en">
<head>
    <title>Register/Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/forms/css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Register/Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url(/forms/images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('sendMailProcess') }}" class="signin-form" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-3">
                                <input type="email" name="email" class="form-control" required>
                                <label class="form-control-placeholder" for="email" >E-Mail</label>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                            </div>
                        </form>
                        @include('admin.layouts.errors')

                        @if(\Illuminate\Support\Facades\Session::has('logout'))
                            <i class="btn btn-success">{{ \Illuminate\Support\Facades\Session::get('logout') }}</i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/forms/js/jquery.min.js"></script>
<script src="/forms/js/popper.js"></script>
<script src="/forms/js/bootstrap.min.js"></script>
<script src="/forms/js/main.js"></script>

</body>
</html>

