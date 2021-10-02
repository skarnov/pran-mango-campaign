<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title}}</title>
        <!-- Bootstrap -->
        <link href="{{ URL('/assets/private/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ URL::to('/assets/private/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ URL::to('/assets/private/build/css/custom.css') }}" rel="stylesheet">   
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <!-- Show Error -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- End of Show Error -->
                        <form method="POST" action="{{url('/login/check_login')}}">
                            @csrf
                            <h1>Login</h1>            
                            <div>
                                <input name="email" type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <button type="submit" class="btn-sm btn btn-danger submit">Log in</button>
                                <a class="reset_pass" href="#">Lost your password?</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <p>©2013 - {{ date ('Y') }} 3devs IT. All Rights Reserved.</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>