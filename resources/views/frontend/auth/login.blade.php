@extends('frontend.layout.app')

@section('content')
@session('success')
    <script>
         successToast("{{ session('success') }}");
    </script>
@endsession
 <div class="container">
    <div class="row">
        <div class="col register">
            <form action="{{ route('loginData') }}" class="register_form" method="POST">
                @csrf
                <h1 class="text-center fw-light">Login Form</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="contactus" type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Passwors</label>
                    <input class="contactus" type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="form-group">
                    <p>Already have an account? <a href="{{ route('register') }}">sign up</a></p>
                </div>
            </form>
        </div>
 </div>
@endsection