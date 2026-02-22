<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Welcome to Dashboard</h1>

    <h3>User Information</h3>

    <p><strong>First Name:</strong> {{ $user->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p>

    <br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>