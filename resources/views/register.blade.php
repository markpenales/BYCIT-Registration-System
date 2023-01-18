<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BYCIT Registration</title>
    <link rel="icon" href="{{asset('images/JPCS.png')}}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link href="{{ asset('css/register.css') }}" type="text/css" rel="stylesheet">

</head>

<body>
    <!-- TODO: Make the navbar a separate template and use it in about.blade and register.blade -->
    <!-- Navigation -->
    <div class="navigation">
        <div class="logo-container child">
            <img src="{{asset('images/JPCS.png')}}" class="logo">
            <a href="/" class="jpcs">JPCS - CSPC Chapter</a>
        </div>
        <div class="links child ">
            <ul>
                <li>
                    <a href="/">Single Registration</a>
                </li>
                <li>
                    <a href="/multi">Multiple Registrations</a>
                </li>
            </ul>
        </div>
    </div>



    <form action="" method="POST">
        {{ csrf_field() }}
        <p class="title">BYCIT Registration</p><br>
        <div class="form-group">
            @if (Session::has('success'))
            <p class="success">Registration Successful!</p>
            @endif


            <div class="name">
                <input type="text" name="last_name" id="last_name" style="{{$errors->first('last_name') ? 'border: 2px solid red' : ''}}" placeholder="Last Name">
                <input type="text" name="first_name" id="first_name" style="{{$errors->first('first_name') ? 'border: 2px solid red' : ''}}" placeholder="First Name">
                <input type="text" name="middle_initial" id="middle_initial" style="{{$errors->first('middle_initial') ? 'border: 2px solid red' : ''}}" placeholder="Middle Initial">
            </div>
            <div class="school">
                <select name="schools" id="schools" style="{{$errors->first('schools') ? 'border: 2px solid red' : ''}}">
                    <option value="" disabled selected>School</option>
                    @foreach (\App\Models\College::all() as $college)
                    <option value="{{$college->id}}"> {{$college->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="type">
                <input type="radio" name="type" value="Student" id="student" checked>
                <label for="student">Student</label>
                <input type="radio" name="type" value="Teacher" id="teacher">
                <label for="teacher">Teacher</label>
            </div>

            <div class="errors">
                @if ($errors->any())
                @foreach($errors->all() as $error)
                <p class="err">{{ucwords($error)}}</p>
                @endforeach
                @endif
            </div>
            <button type="submit" class="">Register</button>
        </div>

    </form>
</body>

</html>