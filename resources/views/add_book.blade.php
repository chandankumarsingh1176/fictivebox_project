<html>
<title>Add Book</title>

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
                        <h5>Book Uploads Form</h5>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="book-submit" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="book_name" class="cols-sm-2 control-label">Book Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="book_name" id="book_name"
                                            value="{{ old('book_name') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_name" class="cols-sm-2 control-label">Author Name.</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="author_name" id="author_name"
                                            value="{{ old('author_name') }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Category" class="cols-sm-2 control-label">Book Category</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                                        <select class="form-control" name="category" id="Category" required>
                                            <option value="">Select Category</option>
                                            <!-- Replace the options below with your categories -->
                                            <option value="motivation " {{ old('Category') == 'motivation ' ? 'selected' : '' }}>Motivation </option>
                                            <option value="education" {{ old('Category') == 'education' ? 'selected' : '' }}>Education</option>
                                            <option value="banking" {{ old('Category') == 'banking' ? 'selected' : '' }}>Banking</option>
                                            <option value="walfair" {{ old('Category') == 'walfair' ? 'selected' : '' }}>Walfair</option>
                                            <option value="fiction" {{ old('Category') == 'fiction' ? 'selected' : '' }}>Fiction</option>
                                            <option value="non-fiction" {{ old('Category') == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                            <option value="science" {{ old('Category') == 'science' ? 'selected' : '' }}>Science</option>
                                            <option value="history" {{ old('Category') == 'history' ? 'selected' : '' }}>History</option>
                                            <option value="biography" {{ old('Category') == 'biography' ? 'selected' : '' }}>Biography</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_pic" class="cols-sm-2 control-label">Book Pic</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="file" class="form-control" name="book_pic" id="book_pic"
                                            value="{{ old('book_pic') }}" required />
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg btn-block login-button"
                                    value="Add Book">
                            </div>

                            <div class="login-register">
                                <a href="book-list"><u>Book List</u></a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
