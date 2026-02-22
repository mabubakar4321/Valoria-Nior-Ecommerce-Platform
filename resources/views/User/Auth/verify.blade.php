@php
$email = request('email');
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
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

        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            background-image: url('https://images.pexels.com/photos/1488463/pexels-photo-1488463.jpeg');
            background-size: cover;
            background-position: center;
            z-index: -2;
        }

        .overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: -1;
        }

        .card {
            width: 380px;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            color: #fff;
            text-align: center;
        }

        .card h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-bottom: 1px solid rgba(255,255,255,0.6);
            background: transparent;
            color: #fff;
            outline: none;
            font-size: 16px;
            text-align: center;
            letter-spacing: 5px;
        }

        input::placeholder {
            color: rgba(255,255,255,0.8);
            letter-spacing: normal;
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
            font-size: 18px;
            letter-spacing: 2px;
            color: #fff;
        }

        .resend-btn {
            margin-top: 15px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .resend-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .resend-btn:hover:not(:disabled) {
            background: #fff;
            color: #000;
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
    <h2>Verify Email</h2>
    <p>Enter the 6-digit code sent to your email</p>

    @if($email)

        <form method="POST" action="{{ route('verify') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <input type="text" name="code" placeholder="Enter Code">
            @error('code') <div class="error">{{ $message }}</div> @enderror

            <button type="submit" class="btn">VERIFY</button>
        </form>

        <p id="timer">01:00</p>

        <form method="POST" action="{{ route('resend.code') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <button type="submit" class="resend-btn" disabled>Resend Code</button>
        </form>

    @else
        <p style="color:white;">Invalid verification session.</p>
    @endif

</div>

<script>
    let time = 60;
    let resendBtn = document.querySelector('.resend-btn');

    let timer = setInterval(function () {

        let minutes = Math.floor(time / 60);
        let seconds = time % 60;

        document.getElementById("timer").innerHTML =
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;

        if (time <= 0) {
            clearInterval(timer);
            resendBtn.disabled = false;
        }

        time--;

    }, 1000);
</script>

</body>
</html>