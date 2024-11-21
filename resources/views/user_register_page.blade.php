<html>
<title>Register Page</title>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>

    <div class="container" style="margin-top: 2%">
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color: red"> Error: {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <a href="dashboard"><u>Back</u></a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: gray;color:aliceblue;text-align: center;">
                        <h5>User Register Form</h5>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="regiter-submit">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="cols-sm-2 control-label">Phone No.</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ old('phone') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob" class="cols-sm-2 control-label">DOB</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="date" class="form-control" name="dob" id="dob"
                                            value="{{ old('dob') }}" required />
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="confirm" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg btn-block login-button"
                                    value="Register">
                            </div>
                            <div class="login-register">
                                <a href="user-login"><u>Login</u></a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
