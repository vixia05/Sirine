<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}" />
    <title>Login</title>
</head>

<body background="{{ asset('assets/img/bg-login.jpg') }}" class="bg-login">
    <div class="wrapper fadeInDown">
        <div id="formContent" class="glass">
            <div class="fadeIn first"><br>
                <div class="row">
                    <div class="col col-md-6 sm-6">
                        <img class="bg-logo" src="{{ asset('assets') }}/img/bumn.png" id="icon" alt="User Icon" />
                    </div>
                    <div class="col col-md-6 sm-6">
                        <img class="bg-logo" src="{{ asset('assets') }}/img/Peruri.png" id="icon"
                            alt="User Icon" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('assets') }}/img/login_logo.png" id="icon" alt="User Icon" />
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('authenticate') }}">
                @csrf
                @method('POST')
                @if (\Session::has('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" style="text-align: center" role="alert">Akun Tidak
                                Ditemukan</div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="np" class="fadeIn second" placeholder="NP / Username">
                        <input type="password" name="password" class="fadeIn third" placeholder="Password">
                        <input type="submit" name="btnLogin" class="fadeIn fourth" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
</body>

</html>
