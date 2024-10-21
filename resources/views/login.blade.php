<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
        }

        h1 {
            margin-right: 50px;
            font-size: 36px;
            color: #333;
            letter-spacing: 2px;
            font-weight: bold;
        }

        form {
            width: 100%;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.6);
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:active {
            transform: translateY(1px);
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: stretch;
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    {{-- @if (session('success'))
        <h5>Berhasil Register</h5>
    @endif --}}

    <div class="container">
        <h1>Login Form</h1>
        <form action="/ProsesLogin" method="POST">
            @csrf
            <input type="text" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>

            <input type="password" name="password" id="password" placeholder="Masukkan Password">
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
