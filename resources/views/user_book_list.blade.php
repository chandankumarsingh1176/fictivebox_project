<html>
<title>Book List</title>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .custab {
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }

        .custab:hover {
            box-shadow: 3px 3px 0px transparent;
            trans ition: 0.5s;
        }

        .card {
            border-radius: 8px;
            overflow: hidden;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .card-img-top {
            border-bottom: 1px solid #e9ecef;
        }
    </style>

    <style>
        .rating {
            direction: rtl;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 1.5em;
            color: #d3d3d3;
            cursor: pointer;
        }

        .rating input[type="radio"]:checked~label {
            color: gold;
        }

        .rating label:hover,
        .rating label:hover~label {
            color: gold;
        }
    </style>




</head>

<body>


    <div class="container mt-5">
        <a href="dashboard" class="btn btn-link mb-3"><u>Back</u></a>
        <h2 class="mb-4">Book Show for User </h2>
        <form method="post" action="user-book-list" class="mb-4 p-3 shadow-sm rounded bg-light">
            @csrf
            <div class="form-row align-items-end">
                <div class="col-md-4 mb-3">
                    <label for="book_name"></label>
                    <input type="text" id="book_name" class="form-control" name="book_name"
                        placeholder="Search by Book Title" value="{{ request('book_name') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="author_name"></label>
                    <input type="text" id="author_name" class="form-control" name="author_name"
                        placeholder="Search by Author Name" value="{{ request('author_name') }}">
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>

                </div>
                <a href="user-book-list" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </form>

<hr>


        <div class="container mt-4">
            <div class="row">
                @forelse ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        @if ($book->book_pic)
                        <img src="{{ asset('storage/books/' . $book->book_pic) }}" class="card-img-top"
                            alt="{{ $book->book_name }}" style="height: 200px; object-fit: cover;">
                        @else
                        <img src="{{ asset('storage/default-book.png') }}" class="card-img-top" alt="Default Book"
                            style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title"><strong>Title:</strong> {{ $book->book_name }}</h5>
                            <p class="card-text text-muted">
                                <strong>Author:</strong> {{ $book->book_author }}
                            </p>
                            <p class="card-text">
                                <strong>Category:</strong> {{ $book->category ?? 'N/A' }}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Added on: {{ $book->created_at->format('d-M-Y') }}</small>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <form action="{{ route('book.rate', $book->id) }}" method="POST">
                                @csrf

                                <div class="rating">
                                    @php
                                    $userRating = DB::table('books')->where('id',$book->id)->first();
                                    $currentRating = $userRating ? round($userRating->rating) : null;
                                    @endphp
                                    <input type="radio" id="star5_{{ $book->id }}" name="rating" value="5" {{
                                        $currentRating==5 ? 'checked' : (old('rating')==5 ? 'checked' : '' ) }}>
                                    <label for="star5_{{ $book->id }}" title="5 stars">&#9733;</label>

                                    <input type="radio" id="star4_{{ $book->id }}" name="rating" value="4" {{
                                        $currentRating==4 ? 'checked' : (old('rating')==4 ? 'checked' : '' ) }}>
                                    <label for="star4_{{ $book->id }}" title="4 stars">&#9733;</label>

                                    <input type="radio" id="star3_{{ $book->id }}" name="rating" value="3" {{
                                        $currentRating==3 ? 'checked' : (old('rating')==3 ? 'checked' : '' ) }}>
                                    <label for="star3_{{ $book->id }}" title="3 stars">&#9733;</label>

                                    <input type="radio" id="star2_{{ $book->id }}" name="rating" value="2" {{
                                        $currentRating==2 ? 'checked' : (old('rating')==2 ? 'checked' : '' ) }}>
                                    <label for="star2_{{ $book->id }}" title="2 stars">&#9733;</label>

                                    <input type="radio" id="star1_{{ $book->id }}" name="rating" value="1" {{
                                        $currentRating==1 ? 'checked' : (old('rating')==1 ? 'checked' : '' ) }}>
                                    <label for="star1_{{ $book->id }}" title="1 star">&#9733;</label>
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" class="form-control"
                                        placeholder="Leave a comment (optional)"
                                        rows="1">{{ old('comment') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm mt-2">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">
                    <p>No books found.</p>
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $books->links() }}
            </div>
        </div>



</body>

</html>
