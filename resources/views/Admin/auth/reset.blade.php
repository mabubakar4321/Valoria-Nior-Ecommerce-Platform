<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Reset Admin Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(135deg,#667eea,#764ba2);
}

/* Glass Card */
.reset-card{
    width:430px;
    padding:45px 40px;
    border-radius:24px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(30px);
    box-shadow:0 30px 70px rgba(0,0,0,0.25);
    border:1px solid rgba(255,255,255,0.2);
    color:#fff;
}

/* Heading */
.reset-card h2{
    text-align:center;
    font-weight:600;
    font-size:24px;
    margin-bottom:6px;
}

.reset-card p{
    text-align:center;
    font-size:14px;
    opacity:.85;
    margin-bottom:30px;
}

/* Input Group */
.input-group{
    margin-bottom:18px;
}

.input-group input{
    width:100%;
    padding:15px 16px;
    border-radius:14px;
    border:none;
    background:rgba(255,255,255,0.20);
    color:#fff;
    font-size:14px;
    outline:none;
    transition:.3s;
}

.input-group input::placeholder{
    color:rgba(255,255,255,0.75);
}

.input-group input:focus{
    background:rgba(255,255,255,0.30);
}

/* Button */
.btn-primary{
    width:100%;
    padding:15px;
    border:none;
    border-radius:14px;
    font-weight:600;
    font-size:15px;
    background:linear-gradient(90deg,#4facfe,#00f2fe);
    color:#fff;
    cursor:pointer;
    transition:.3s;
    margin-top:10px;
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 30px rgba(0,0,0,0.25);
}

/* Security Note */
.security-note{
    margin-top:22px;
    font-size:13px;
    opacity:.75;
    text-align:center;
    line-height:1.6;
}

/* Back link */
.back-link{
    margin-top:18px;
    text-align:center;
    font-size:14px;
}

.back-link a{
    color:#a5f3fc;
    text-decoration:none;
}

.back-link a:hover{
    text-decoration:underline;
}

</style>
</head>
<body>

<div class="reset-card">

    <h2>Reset Password</h2>
    <p>Enter your verification code and create a new password</p>

    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf

        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="input-group">
            <input type="text" name="code" placeholder="Verification Code" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="New Password" required>
        </div>

        <div class="input-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button class="btn-primary">Update Password</button>
    </form>

    <div class="security-note">
        For security reasons, verification codes expire automatically.
        If your code has expired, request a new one.
    </div>

    <div class="back-link">
        <a href="{{ route('admin.login') }}">← Back to Login</a>
    </div>

</div>

</body>
</html>