@if(session('email'))
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
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

        /* Dark Overlay */
        .overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: -1;
        }

        /* Glass Card */
        .card {
            width: 400px;
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
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 18px;
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

        .otp-input {
            text-align: center;
            letter-spacing: 5px;
            font-size: 18px;
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

        #timer {
            margin-top: 15px;
            font-size: 16px;
            letter-spacing: 2px;
            color: #fff;
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
    <h2>Reset Password</h2>
    <p>Enter the code and your new password</p>

    <form method="POST" action="{{ route('reset.password') }}">
        @csrf

        <input type="hidden" name="email" value="{{ session('email') }}">

        <div class="form-group">
            <input type="text" name="code" class="otp-input" placeholder="Enter Code">
            @error('code') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="New Password">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn">Update Password</button>
    </form>

    <p id="timer">01:00</p>
</div>

<script>
let time = 60;
let timer = setInterval(function () {
    let minutes = Math.floor(time / 60);
    let seconds = time % 60;

    document.getElementById("timer").innerHTML =
        (minutes < 10 ? "0" : "") + minutes + ":" +
        (seconds < 10 ? "0" : "") + seconds;

    if (time <= 0) {
        clearInterval(timer);
    }

    time--;
}, 1000);
</script>

</body>
</html>
@endif