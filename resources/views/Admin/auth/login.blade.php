<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
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
.login-card{
    width:420px;
    padding:45px 40px;
    border-radius:24px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(30px);
    box-shadow:0 30px 70px rgba(0,0,0,0.25);
    border:1px solid rgba(255,255,255,0.2);
    color:#fff;
}

/* Heading */
.login-card h2{
    text-align:center;
    font-weight:600;
    margin-bottom:6px;
    font-size:26px;
}

.login-card p{
    text-align:center;
    font-size:14px;
    opacity:.85;
    margin-bottom:30px;
}

/* Input Group */
.input-group{
    position:relative;
    margin-bottom:20px;
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

/* Options */
.options{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:13px;
    margin-bottom:25px;
}

.options a{
    color:#a5f3fc;
    text-decoration:none;
}

.options a:hover{
    text-decoration:underline;
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
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 30px rgba(0,0,0,0.25);
}

/* Divider */
.divider{
    text-align:center;
    margin:28px 0;
    font-size:12px;
    opacity:.75;
}

/* Google Button */
.btn-google{
    display:flex;
    justify-content:center;
    align-items:center;
    padding:14px;
    border-radius:14px;
    background:rgba(255,255,255,0.18);
    color:#fff;
    text-decoration:none;
    font-size:14px;
    transition:.3s;
}

.btn-google:hover{
    background:rgba(255,255,255,0.28);
}

/* Register Link */
.register-link{
    margin-top:22px;
    text-align:center;
    font-size:14px;
}

.register-link a{
    color:#a5f3fc;
    text-decoration:none;
    margin-left:5px;
}

.register-link a:hover{
    text-decoration:underline;
}
</style>
</head>
<body>

<div class="login-card">

    <h2>Welcome Back</h2>
    <p>Sign in to your admin account</p>

    <form method="POST" action="{{ route('admin.login.for') }}">
        @csrf

        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="options">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
            <a href="{{ route('admin.password.request') }}">Forgot password?</a>
        </div>

        <button class="btn-primary">Sign In</button>
    </form>

    <div class="divider">or continue with</div>

    <a href="{{ route('admin.google') }}" class="btn-google">
        Continue with Google
    </a>

    <div class="register-link">
        Don’t have an account?
        <a href="{{ route('admin.register') }}">Create Account</a>
    </div>

</div>

</body>
</html>