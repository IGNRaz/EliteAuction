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
        <input type="hidden" name="banned_email" value="{{ $user && $user->first() ? $user->first()->email : '' }}">
        <input type="text" name="reason" value="{{ old('reason', $reason->reason ?? '') }}">
        <input type="text" name="expires_at" value="{{ old('expires_at', $expires_at->expires_at ?? '') }}">
        <button type="submit">Ban</button>
    </form>
</body>
</html>