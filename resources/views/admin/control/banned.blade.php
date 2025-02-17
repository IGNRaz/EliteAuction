<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.users.ban', $user) }}" method="POST">
        @csrf
        <input type="hidden" name="banned_email" value="{{ $user->email }}">
        <input type="text" name="reason" value="{{ old('reason') }}" placeholder="Reason for ban">
<input type="date" name="expires_at" value="{{ old('expires_at') }}">


        <button type="submit">Ban</button>
    </form>
</body>
</html>