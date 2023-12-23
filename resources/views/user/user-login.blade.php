@extends('layouts.app')
<style>
    body {
            /* Left bottom corner SVG */
            background-image: url('/assets/img/log1.svg');
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: auto; /* Adjust this based on your SVG sizes */
            height: 20vh;
        }

    @media (max-width: 767px) {
        /* Styles for screens smaller than 768px (e.g., mobile phones) */
        #card {
            margin-top: 0px;
            height: auto; /* Adjust height as needed for mobile devices */
        }

        body {
            background: none; /* Remove background styling for smaller screens */
        }
    }

</style>

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-6 mt-5 mb-5">
            <div class="card shadow-lg" style="margin-top: 35px;height: 340px;border: 1px solid #1abc9c;">
                <div class="card-header" style="background-color: #2c3e50; color: #fff;">
                    <h6 class="mb-0">Login</h6>
                </div>
                <form action="{{route('login.post')}}" method="post" class="p-4">@csrf
                    <div class="card-body">
                        <div class="form-group mb-4" style="margin-top: -30px;">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                <button type="button" class="btn btn-outline-primary" id="showPasswordBtn">Show</button>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <div class="text-center" style="margin-top: 10px;">
                            <p>Don't have an account? <a href="{{ route('create.user') }}">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-3">
                @if(session('successMessage'))
                <div class="alert alert-success text-center" id="successAlert" style="background-color: #fff; color: #000">
                    {{ session('successMessage') }}
                </div>
                <script>
                    setTimeout(function () {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 2000);
                </script>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('showPasswordBtn').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>

@endsection

