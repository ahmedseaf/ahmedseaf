<div class="containerForm">
    <div class="containerCover">
        <div class="loginBorder">
            <div class="loginForm">
                <form action="<?php echo url('/user/login-admin')?>" method="post">
                    <i class="fas fa-at"></i>
                    <input id="aEmail" type="text" name="email">

                    <i class="fas fa-key"></i>
                    <input id="aPassword" type="password" name="password">

                    <input type="submit" id="aSubmit" name="submitUser" value="Login">
                    <br>
                    <br>
                    <div style="margin-top: 2rem"><a style="color: white" href="<?php echo url('user/register')?>">New Users</a></div>
                </form>
            </div>
        </div>
    </div>

</div>
