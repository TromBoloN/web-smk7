<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @include('imports.css')
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        
        <section class="fcol g-20 login-title">
            <img src="{{asset('/images/smk7-no-bg-logo.png')}}" alt="" width="100">

            <section class="fcol">
                <h3>SMK Negeri 7 Samarinda</h3>
                <h5>Sekolah Para Juara!</h5>
            </section>
        </section>

        <form action="{{url('/auth')}}" method="POST" class="login-form">

            @csrf
            <div class="form-group">
                
                <section class="login-input frow g-20">
                    <i class="fa-brands fa-google"></i>
                    <input type="email" name="email" id="email" required placeholder="Email">
                </section>
                
            </div>

            <div class="form-group">
                
                <section class="login-input frow g-20">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </section>


            </div>

            <button type="submit">Login</button>

            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            {{-- <div class="form-footer">
                Gak Punya Akun? <a href="{{ route('register') }}">Registrasi Disini</a>.
            </div> --}}

        </form>
    </div>
</body>
</html>
