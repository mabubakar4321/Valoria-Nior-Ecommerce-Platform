<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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

        /* Background Image */
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
            background: rgba(0,0,0,0.55);
            z-index: -1;
        }

        /* Glass Card */
        .card {
            width: 420px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(18px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            color: #fff;
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
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
            margin-top: 3px;
        }

        .btn {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            border-radius: 25px;
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

        .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            color: #fff;
            text-decoration: underline;
        }

        /* Scrollbar styling */
        .card::-webkit-scrollbar {
            width: 5px;
        }

        .card::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.5);
            border-radius: 10px;
        }

        @media(max-width:500px){
            .card{
                width:90%;
                padding:30px;
            }
        }
    </style>
</head>

<body>

<div class="background"></div>
<div class="overlay"></div>

<div class="card">
    <h2>Sign Up</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input type="text" name="first_name" placeholder="First Name *" value="{{ old('first_name') }}">
            @error('first_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="last_name" placeholder="Last Name *" value="{{ old('last_name') }}">
            @error('last_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number *" value="{{ old('phone') }}">
            @error('phone') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="alternate_phone" placeholder="Alternate Phone Number">
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email *" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="email" name="alternate_email" placeholder="Alternate Email Address">
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password *">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password *">
        </div>

        <button type="submit" class="btn">REGISTER</button>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login.form') }}">Login</a>
        </div>

    </form>
</div>

</body>
</html>