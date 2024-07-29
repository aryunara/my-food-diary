<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <style>
        body {
            font-size: 13px;
            line-height: 1.8;
            color: #222;
            background: url('<?php echo e(asset('/storage/projectImages/background.jpg')); ?>') no-repeat center center fixed;
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

        .signup-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            width: 100%;
        }

        .signup-form, .signup-image {
            flex: 1;
            padding: 20px;
        }

        .signup-form {
            margin-right: 40px;
            margin-top: -60px;
        }

        .signup-form h2 {
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

        .signup-image figure {
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-image img {
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

            .signup-form, .signup-image {
                width: 100%;
                padding: 20px;
            }

            .signup-form {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
<div class="main">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="<?php echo e(route('register')); ?>" id="register-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account"></i></label>
                        <input type="text" name="username" id="username" placeholder="Username" />
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" />
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password" />
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="Repeat your password" />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="<?php echo e(asset('/storage/projectImages/signup-img.jpg')); ?>" alt="sign up image"></figure>
                <a href="/login" class="signup-image-link">I already have an account</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>