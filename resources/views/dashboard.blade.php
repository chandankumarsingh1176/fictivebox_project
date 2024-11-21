<html>
<title>Dashboard</title>

<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    @include('nav_page')

    <div class="container mt-4">

        <div class="row">

            <div class="col-md-4 mb-4" style="background-color: aquamarine">
                <h3>Total User: {{ $total_user }}</h3>
            </div>
            <div class="col-md-4 mb-4" style="background-color: rgb(33, 90, 147);color:aliceblue">
                <h3>Total Book: {{ $total_book }}</h3>
            </div>
        </div>
    </div>
</body>

</html>
