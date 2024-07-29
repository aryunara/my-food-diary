<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <style>
        body {
            font-size: 13px;
            line-height: 1.8;
            color: #222;
            background: url('{{ asset('/storage/projectImages/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Poppins, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 1100px;
            height: 600px;
            background: #fff;
            margin: 50px auto;
            margin-top: 150px;
            box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .signin-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            width: 100%;
        }

        .signin-form, .signin-image {
            flex: 1;
            padding: 20px;
        }

        .signin-form {
            margin-right: 40px;
            margin-top: -160px;
        }

        .signin-form h2 {
            margin-bottom: 20px;
            font-size: 36px;
            color: #222;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #999;
        }

        .form-group input {
            width: 100%;
            padding: 10px 10px 10px 30px;
            border: none;
            border-bottom: 1px solid #999;
            font-family: 'Poppins', sans-serif;
        }

        .form-group input:focus {
            border-bottom: 1px solid #222;
        }

        .invalid-feedback {
            color: red;
            font-size: 12px;
        }

        .form-submit {
            background: #6dabe4;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-submit:hover {
            background: #4292dc;
        }

        .signin-image figure {
            text-align: center;
            margin-bottom: 20px;
        }

        .signin-image img {
            width: 100%;
            border-radius: 10px;
        }

        .signup-image-link {
            font-size: 14px;
            color: #222;
            display: block;
            text-align: center;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .signin-form, .signin-image {
                width: 100%;
                padding: 20px;
            }

            .signin-form {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
<div class="main">
    <div class="container">
        <div class="signin-content">
            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" />
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password" />
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                    </div>
                </form>
            </div>
            <div class="signin-image">
                <figure><img src="{{ asset('/storage/projectImages/signin-img.jpg') }}" alt="sign in image"></figure>
                <a href="/register" class="signup-image-link">Create an account</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
