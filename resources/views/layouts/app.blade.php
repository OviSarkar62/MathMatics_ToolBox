<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MathMagic ToolBox</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.6.0/math.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        /* Custom styles for the compact navbar */
        .navbar-nav .nav-link:hover {
            color: #007bff; /* Set hover color for the nav links */
        }

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
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">MathMatics ToolBox</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @if(!Auth::check())
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('create.user') }}">Register</a></li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- ... (your existing body content) ... -->
    @yield('content')
    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
