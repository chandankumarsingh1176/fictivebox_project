<html>
<title></title>

<head>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .navbar-inner {
            /*height: 90px*/
            min-height: 60px
        }

        .navbar .brand {
            padding: 0 10px;
        }

        .navbar .nav>li>a {
            padding: 20px 15px;
            /*padding: 35px 15px;*/
        }

        .navbar .btn-navbar {
            /*margin-right: 0px;*/
            margin-top: 15px;
        }

        .brand img {
            margin-top: 5px
        }

        @media (max-width:768px) {
            .brand img {
                margin-bottom: 5px
            }

            .navbar .btn-navbar {
                /*margin-right: -15px;*/
            }

            .navbar .nav>li>a {
                padding: 10px 15px;
            }
        }
    </style>
</head>

<body>


    <div class="container">

        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="#" style="background: black">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="background: black;padding-top: 21px;">

                </a>

                <div class="nav-collapse collapse">
                    <ul class="nav">

                        <li><a href="/">Registesion Page</a></li>
                        <li><a href="user-login">Login page</a></li>
                        <li><a href="user-list">Users List  (admin)</a></li>
                        <li><a href="add-book-form">Uploads Book</a></li>
                        <li><a href="user-book-list">Book Show</a></li>
                        <li><a href="book-list">Book List (admin)</a></li>

                    </ul>

                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
