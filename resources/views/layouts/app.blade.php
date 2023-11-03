<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MathMagic ToolBox</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.6.0/math.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    /* Styles for the dashboard page */
    .dashboard-container .card {
        height: 200px;
        width: 300px;
        background-color: #232D3F; /* Set a background color for the cards */
        color: #333; /* Set text color for the cards */
    }

    /* Style for the card header */
    .dashboard-container .card-header {
        background-color: #232D3F; /* Set a background color for the card header */
        color: #fff; /* Set text color for the card header */
    }

    /* Style for the card body */
    .dashboard-container .card-body {
        background-color: #fff; /* Set a background color for the card body */
    }

    /* Style for the toggle button */
    .dashboard-container .toggle-todo {
        background-color: #D80032; /* Set a background color for the toggle button */
        color: #fff; /* Set text color for the toggle button */
    }

    /* Additional style for completed items */
    .dashboard-container .toggle-todo.completed {
        background-color: #005B41; /* Change button background color for completed tasks */
    }
    .dashboard-container .checked {
    text-decoration: line-through;
    }

</style>

<style>
    /* Styles for the dashboard page */


    /* Style for the card header */
    .create-body-container .card-header {
        background-color: #232D3F; /* Set a background color for the card header */
        color: #fff; /* Set text color for the card header */
    }

    /* Style for the card body */
    .create-body-container .card-body {
        background-color: #fff; /* Set a background color for the card body */
    }

</style>


<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg bg-dark shadow-lg" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.user') }}">Register</a>
                    </li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item" style="margin-right: 20px;">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none;">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-transform: uppercase;">
                            {{ auth()->user()->name }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>




</html>
