<div class="containerForm">
    <div class="containerCover">
        <div class="loginBorder">
            <div class="loginForm">
                <form action="<?php echo url('/user/post-register')?>" method="post">
                    <i class="fas fa-user"></i>
                    <input id="aUser" type="text" name="user_name" placeholder="Enter Your User Name">

                    <i class="fas fa-at"></i>
                    <input id="aEmail" type="text" name="email" placeholder="Enter Your Email">

                    <i class="fas fa-key"></i>
                    <input id="aPassword" type="password" name="password" placeholder="Password">

                    <i class="fas fa-key"></i>
                    <input id="aPassword" type="password" name="c_password" placeholder="Confirm Password">
<br>
                    <input type="submit" id="aSubmit" name="submitRegister" value="Register">

                </form>
            </div>
        </div>
    </div>

</div>
