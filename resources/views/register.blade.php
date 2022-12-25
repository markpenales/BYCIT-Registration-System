<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        @endauth
    @endif

    @if (Session::has('success'))
    Registration Complete!
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{ $error }} <br>
    @endforeach
    </div>
    @endif
    <form action="" method="POST">
        {{ csrf_field() }}
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" required> <br>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" required> <br>
        <label for="middle_initial">Middle Name</label>
        <input type="text" name="middle_initial" id="middle_initial"> <br>
        <input type="radio" name="type" value="Student" id="student" checked>
        <label for="student">Student</label>
        <input type="radio" name="type" value="Teacher" id="teacher">
        <label for="teacher">Teacher</label><br>
        <input type="submit">
    </form>
</body>

</html>