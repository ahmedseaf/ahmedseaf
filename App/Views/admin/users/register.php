
<div class="container">
<div class="row justify-content-center">
<div class="col-md-4  mt-5 bg-light">
    <div class="card">
        <div class="card-body">

<div class="row">

            <!--          Login Form     -->
    <form action="<?php echo url('/login/login')?>" method="post" id="user_login-form" class="col-md-12">
        <div class="col-md-12 text-center mb-3" ><span>Login</span> </div><br>
        <div class="col-md-12" id="result-login"></div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your User Name" required>
        </div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            </div>
<!--            TODO:: Edit Password Min And Max Char-->
            <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
        </div>
        <div class="row">
            <div class="custom-control custom-checkbox col-md-6">
                <input class="custom-control-input" type="checkbox" id="remember" name="remember" value="remember">
                <label for="remember" class="custom-control-label">remember</label>
            </div>
            <div class="form-group col-md-6">
                <a href="#" id="login-forget-btn">forget Password</a>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="login" id="login" class="form-control btn btn-primary" value="Login">
        </div>
        <div class="form-group col-md-12">
            <span>Register? <a href="#" id="login-register-btn">New Account</a></span>
        </div>
    </form>
         <!--        End Login Form     -->

         <!--          Forget Password Form     -->

    <form action="<?php echo url('/login/forget')?>" method="post" id="forget_password-form" class="col-md-12" style="display: none;">
        <div class="col-md-12 text-center mb-3" ><span>Forget Password</span> </div><br>
        <div class="col-md-12" id="result-forget"></div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="email" name="email_forget" class="form-control" placeholder="Enter your E-mail" required>
        </div>
        <div class="form-group">
            <input type="submit" name="forget" id="forget" class="form-control btn btn-primary" value="Send Password">
        </div>
        <div class="form-group col-md-12">
            <span>Register? <a href="#" id="forget-new-acount-btn">New Account</a></span>
        </div>
    </form>
    <!--          End Forget Password Form     -->

    <!--          Register Form            -->

    <form action="<?php echo url('/login/register')?>" method="post" id="user_register-form" style="display: none;">
        <div class="col-md-12" id="result"></div>
        <div class="col-md-12 text-center mb-3" ><span>Register New Account</span> </div><br>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="user_name" class="form-control" placeholder="Enter your User Name" required>
        </div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your E-mail" required>
        </div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            </div>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" required>
        </div>
        <div class="form-group input-group col-md-12">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            </div>
            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <div class="custom-control custom-checkbox col-md-12">
            <input class="custom-control-input" type="checkbox" id="agree" name="agree" value="agree">
            <label for="agree" class="custom-control-label"> I agree For The Web And I Red</label>
        </div>
        <div class="form-group">
            <input type="submit" name="register" id="register" class="form-control btn btn-primary" value="Register">
        </div>
        <div class="form-group col-md-12">
            <span>You have Account? <a href="#" id="login-btn">Login</a></span>
        </div>
    </form>

    <!--         End Register Form            -->
</div>
</div>
</div>
</div>
</div>
</div>
