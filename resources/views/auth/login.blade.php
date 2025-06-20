<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            background-color: #3490dc;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }
        a {
            display: block;
            margin-top: 10px;
            color: #3490dc;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Email</label>
            <input type="email" name="email" required autofocus>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <a href="{{ route('register') }}">Nemate nalog? Registrujte se</a>
    </div>
</body>
</html>