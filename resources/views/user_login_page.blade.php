<html>
<title>Login page</title>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 5000);
    </script>
    @endif

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
                        <h5>User Login Form</h5>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="login-submit">
                            @csrf


                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email" required />
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
                                <input type="submit" class="btn btn-primary btn-lg btn-block login-button"
                                    value="Login">
                            </div>
                            <div class="login-register">
                                <a href="/"><u>Register</u></a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
