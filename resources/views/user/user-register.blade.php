@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6" style="margin-top: 80px;">
            <h1>Use MathMagic ToolBox</h1>
            <h3>Please create an account</h3>
        </div>

        <div class="col-md-6 mt-5 mb-5">
            <div class="card shadow-lg" id="card" style="margin-top: 30px; border-radius: 15px;">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Register</h4>
                </div>
                <form action="{{ route('store.user') }}" method="post" id="registrationForm" class="p-4">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">Full name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" required>
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
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-5 mt-3">
                            <button class="btn btn-primary" id="btnRegister" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="message" class="mt-2"></div>
        </div>
    </div>
</div>

@endsection
