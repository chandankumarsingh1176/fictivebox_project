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
            transition: 0.5s;
        }
    </style>
</head>

<body>


    <div class="container mt-5">
        <a href="dashboard" class="btn btn-link mb-3"><u>Back</u></a>
        <a href="add-book-form" class="btn btn-link mb-3"><u>Add new Book</u></a>

        <h2 class="mb-4">Book List for Admin </h2>

        <!-- Filter Form -->
        <form method="post" action="book-list" class="mb-4 p-3 shadow-sm rounded bg-light">
            @csrf
            <div class="form-row align-items-end">
                <!-- Name Input -->
                <div class="col-md-4 mb-3">
                    <label for="book_name"></label>
                    <input type="text" id="book_name" class="form-control" name="book_name"
                        placeholder="Search by Book Title" value="{{ request('book_name') }}">
                </div>
                <!-- Email Input -->
                <div class="col-md-4 mb-3">
                    <label for="author_name"></label>
                    <input type="text" id="author_name" class="form-control" name="author_name"
                        placeholder="Search by Author Name" value="{{ request('author_name') }}">
                </div>
                <!-- Filter Buttons -->
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>

                </div>
                <a href="{{ url('book-list') }}" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </form>

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Book pic</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $key => $user)
                    <tr>
                        <td>{{ $books->firstItem() + $key }}</td>
                        <td>{{ $user->book_name }}</td>
                        <td>{{ $user->book_author }}</td>
                        <td>
                            <!-- Display book image -->
                            @if ($user->book_pic)
                            <img src="{{ asset('storage/books/' . $user->book_pic) }}" alt="{{ $user->book_name }}"
                                width="50">
                            @else
                            <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $user->category }}</td>
                        <td>{{ $user->created_at->format('d-M-Y') }}</td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a class="btn btn-info btn-sm" href="{{ route('book.edit', $user->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('book.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this book?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No Books found.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>



</body>

</html>
