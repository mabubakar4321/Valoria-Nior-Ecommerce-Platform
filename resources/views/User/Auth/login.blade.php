<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Premium Luxury Background */
        .background {
            position: fixed;
            width: 100%;
            height: 100%;
      background-image: url('https://images.pexels.com/photos/1488463/pexels-photo-1488463.jpeg');
            background-size: cover;
            background-position: center;
            z-index: -2;
        }

        /* Dark Overlay */
        .overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.65);
            z-index: -1;
        }

        /* Glass Card */
        .card {
            width: 400px;
            padding: 45px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            color: #fff;
        }

        .card h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: none;
            border-bottom: 1px solid rgba(255,255,255,0.6);
            background: transparent;
            color: #fff;
            outline: none;
            font-size: 14px;
        }

        input::placeholder {
            color: rgba(255,255,255,0.8);
        }

        input:focus {
            border-color: #fff;
        }

        .error {
            font-size: 12px;
            color: #ffdada;
            margin-top: 5px;
        }

        .btn {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            border: none;
            background: #ffffff;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #000;
            color: #fff;
        }

        .links {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
        }

        .links a {
            display: block;
            color: #fff;
            text-decoration: underline;
            margin-top: 8px;
        }

        @media(max-width:500px){
            .card{
                width:90%;
                padding:35px;
            }
        }
    </style>
</head>

<body>

<div class="background"></div>
<div class="overlay"></div>

<div class="card">
    <h2>Sign In</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" placeholder="Email *">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password *">
        </div>

        <button type="submit" class="btn">SIGN IN</button>
    </form>

    <div class="links">
        <a href="{{ route('register.form') }}">Create Account</a>
        <a href="{{ route('forgot.form') }}">Forgot Password?</a>
    </div>

</div>

</body>
</html>