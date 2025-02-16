<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>User Management</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_banned ? 'Banned' : 'Active' }}</td>
                    <td>
                        @if($user->isBanned())
                        <form action="{{ route('admin.user.unban', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Unban</button>
                        </form>
                        
                        </form>
                        @else
                        <a href="{{ route('admin.user.ban', ['user' => $user->id]) }}" class="btn btn-danger">Ban</a>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
