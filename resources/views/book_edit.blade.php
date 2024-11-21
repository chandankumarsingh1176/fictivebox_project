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

        <a href="/dashboard"><u>Back</u></a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: gray;color:aliceblue;text-align: center;">
                        <h5>Book Update Form</h5>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Book Name -->
                            <div class="form-group">
                                <label for="book_name" class="cols-sm-2 control-label">Book Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="book_name" id="book_name"
                                            value="{{ old('book_name', $book->book_name) }}" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Author Name -->
                            <div class="form-group">
                                <label for="book_author" class="cols-sm-2 control-label">Author Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="book_author" id="book_author"
                                            value="{{ old('book_author', $book->book_author) }}" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Book Category -->
                            <div class="form-group">
                                <label for="Category" class="cols-sm-2 control-label">Book Category</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                                        <select class="form-control" name="category" id="Category" required>
                                            <option value="">Select Category</option>
                                            <option value="motivation" {{ old('category', $book->category) == 'motivation' ? 'selected' : '' }}>Motivation</option>
                                            <option value="education" {{ old('category', $book->category) == 'education' ? 'selected' : '' }}>Education</option>
                                            <option value="banking" {{ old('category', $book->category) == 'banking' ? 'selected' : '' }}>Banking</option>
                                            <option value="walfair" {{ old('category', $book->category) == 'walfair' ? 'selected' : '' }}>Walfair</option>
                                            <option value="fiction" {{ old('category', $book->category) == 'fiction' ? 'selected' : '' }}>Fiction</option>
                                            <option value="non-fiction" {{ old('category', $book->category) == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                            <option value="science" {{ old('category', $book->category) == 'science' ? 'selected' : '' }}>Science</option>
                                            <option value="history" {{ old('category', $book->category) == 'history' ? 'selected' : '' }}>History</option>
                                            <option value="biography" {{ old('category', $book->category) == 'biography' ? 'selected' : '' }}>Biography</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Book Image -->
                            <div class="form-group">
                                <label for="book_pic" class="cols-sm-2 control-label">Book Pic</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="file" class="form-control" name="book_pic" id="book_pic" />
                                    </div>
                                    @if ($book->book_pic)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/books/' . $book->book_pic) }}" alt="{{ $book->book_name }}" width="100">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Update Book">
                            </div>



                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
