<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @include('imports.css')
    <title>Register</title>
    <style>
      
    </style>
</head>
<body>
    <div class="login-container mb-5 mt-5">
        <section class="fcol g-20 login-title">
            <img src="{{asset('/images/smk7-no-bg-logo.png')}}" alt="" width="100">

            <section class="fcol">
                <h5>Register Page</h5>
            </section>
        </section>
        
        <form action="{{ route('register') }}" method="POST"  class="login-form">
            
            @csrf
            <div class="form-group">
                <section class="login-input frow g-20">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" required placeholder="Username..." value="{{ old('username') }}">
                </section>
                @error('username')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <section class="login-input frow g-20">
                    <i class="fa-brands fa-google"></i>
                    <input type="email" name="email" id="email" required placeholder="Email">
                </section>                
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <section class="login-input frow g-20">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" required placeholder="Password...">
                </section>        
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <section class="login-input frow g-20">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </section>
            </div>

            <button type="submit">Register</button>

            <div class="form-footer">
                Sudah punya akun ? <a href="{{ route('login') }}">Login disini</a>.
            </div>
        </form>
        

    </div>
</body>
</html>
