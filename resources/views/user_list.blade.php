<html>
<title>User List</title>

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
        <h2 class="mb-4">User List</h2>
        <form method="post" action="user-list" class="mb-4 p-3 shadow-sm rounded bg-light">
            @csrf
            <div class="form-row align-items-end">
                <div class="col-md-4 mb-3">
                    <label for="name"></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Search by Name"
                        value="{{ request('name') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email"></label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Search by Email"
                        value="{{ request('email') }}">
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>

                </div>
                <a href="{{ url('user-list') }}" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-M-Y') }}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('user_edit', $user->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('user_delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No users found.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>



</body>

</html>
