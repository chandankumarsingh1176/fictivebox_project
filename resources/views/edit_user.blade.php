<html>
<title></title>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>


    <div class="container mt-5">
        <a href="{{ route('user_list') }}" class="btn btn-link mb-3"><u>Back to User List</u></a>
        <h2 class="mb-4">Edit User</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('user_update', $user->id) }}" class="p-4 shadow-sm bg-light rounded">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}"
                    required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email"
                    value="{{ old('email', $user->email) }}" required>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" class="form-control" name="phone"
                    value="{{ old('phone', $user->phone) }}">
                @error('phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" class="form-control" name="dob" value="{{ old('dob', $user->dob) }}">
                @error('dob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('user_list') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

</body>

</html>
