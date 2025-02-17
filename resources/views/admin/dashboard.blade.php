<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <div class="list-group">
            <a href="{{ route('admin.logs') }}" class="list-group-item list-group-item-action">View Logs</a>
            <a href="{{ route('admin.auctions') }}" class="list-group-item list-group-item-action">Manage Auctions</a>
            <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">User Management</a> 
        </div>
    </div>
</body>
</html>