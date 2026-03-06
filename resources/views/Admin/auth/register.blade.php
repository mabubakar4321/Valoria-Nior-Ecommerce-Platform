<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Register</title>
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
.register-card{
    width:400px;
    padding:40px 35px;
    border-radius:22px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(30px);
    box-shadow:0 25px 60px rgba(0,0,0,0.25);
    border:1px solid rgba(255,255,255,0.2);
    color:#fff;
}

.register-card h2{
    text-align:center;
    font-weight:600;
    margin-bottom:6px;
}

.register-card p{
    text-align:center;
    font-size:13px;
    opacity:.85;
    margin-bottom:28px;
}

/* Inputs */
.input-group{
    margin-bottom:18px;
}

.input-group input{
    width:100%;
    padding:14px 16px;
    border-radius:12px;
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
    padding:14px;
    border:none;
    border-radius:12px;
    font-weight:600;
    font-size:14px;
    background:linear-gradient(90deg,#4facfe,#00f2fe);
    color:#fff;
    cursor:pointer;
    transition:.3s;
    margin-top:5px;
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 30px rgba(0,0,0,0.25);
}

/* Divider */
.divider{
    text-align:center;
    margin:25px 0;
    font-size:12px;
    opacity:.75;
}

/* Social Buttons */
.social-buttons{
    display:flex;
    gap:12px;
}

.social-buttons a{
    flex:1;
    padding:12px;
    text-align:center;
    border-radius:12px;
    background:rgba(255,255,255,0.18);
    color:#fff;
    text-decoration:none;
    font-size:13px;
    transition:.3s;
}

.social-buttons a:hover{
    background:rgba(255,255,255,0.28);
}

/* Footer */
.footer{
    margin-top:22px;
    text-align:center;
    font-size:13px;
}

.footer a{
    color:#a5f3fc;
    text-decoration:none;
}

.footer a:hover{
    text-decoration:underline;
}
</style>
</head>
<body>

<div class="register-card">

    <h2>Create Account</h2>
    <p>Register to access your dashboard</p>

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <div class="input-group">
            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button class="btn-primary">Sign Up</button>
    </form>

    <div class="divider">or continue with</div>

    <div class="social-buttons">
        <a href="{{ route('admin.google') }}">Google</a>
        {{-- <a href="#">GitHub</a> --}}
    </div>

    <div class="footer">
        Already have an account?
        <a href="{{ route('admin.adminlogin') }}">Sign in</a>
    </div>

</div>

</body>
</html>