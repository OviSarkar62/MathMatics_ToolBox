@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6" style="margin-top: 80px; color: #fff;">
            <h1>Use MathMagic ToolBox</h1>
            <h3>Please create an account</h3>
        </div>

        <div class="col-md-6 mt-5 mb-5">
            <div class="card shadow-lg" id="card" style="margin-top: 30px;height: 420px; border: 1px solid #1abc9c;">
                <div class="card-header" style="background-color: #2c3e50; color: #fff;">
                    <h4 class="mb-0">Register</h4>
                </div>
                <form action="{{ route('store.user') }}" method="post" id="registrationForm" class="p-4">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-4" style="margin-top: -30px;">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email" required>
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
                        <div class="form-group mb-5 mt-3">
                            <button class="btn btn-primary" id="btnRegister" type="submit">Register</button>
                        </div>
                        <div class="text-center" style="margin-top: -50px;">
                            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div id="message" class="mt-2"></div>
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
