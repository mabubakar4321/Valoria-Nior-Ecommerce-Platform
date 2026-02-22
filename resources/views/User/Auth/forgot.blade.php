<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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

        /* Luxury Boutique Background */
        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            background-image: url('https://images.pexels.com/photos/1488463/pexels-photo-1488463.jpeg');
            background-size: cover;
            background-position: center;
            z-index: -2;
        }

        /* Dark overlay */
        .overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: -1;
        }

        /* Glass Card */
        .card {
            width: 380px;
            padding: 45px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            color: #fff;
            text-align: center;
        }

        .card h2 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 25px;
            opacity: 0.9;
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
            margin-top: 30px;
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

        .back-link {
            margin-top: 20px;
            display: block;
            font-size: 14px;
            color: #fff;
            text-decoration: underline;
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
    <h2>Forgot Password</h2>
    <p>Enter your registered email to receive a reset code</p>

    <form method="POST" action="{{ route('send.reset.code') }}">
        @csrf

        <input type="email" name="email" placeholder="Enter your email">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <button type="submit" class="btn">Send Code</button>
    </form>

    <a href="{{ route('login.form') }}" class="back-link">Back to Login</a>
</div>

</body>
</html>