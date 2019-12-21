
<div class="container">
    <div class="col-md-12">

            <div id="resultPassword"> </div>

    </div>
<div class="row justify-content-center">
<div class="col-md-4  mt-5 bg-light">
    <div class="card">
        <div class="card-body">

<div class="row">


    <!--          Register Form            -->
<div class="row" style="width: 100%;">
    <div class="col-md-4 offset-4">
        <img id="loading" src="<?php echo assets('/images/loading/1.gif')?>"  alt="loading"  style="display: none ;width: 50px;height: 50px">
    </div>
</div>
    <form action="<?php echo url('/newpassword')?>" method="post" id="active-password-form">
        <div class="col-md-12" id="result"></div>
        <div class="col-md-12 text-center mb-3" ><span>Reset Password</span> </div><br>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>" >
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

        <div class="form-group">
            <input type="submit" name="reset_password" id="resetPassword" class="form-control btn btn-primary" value="Reset Password">
        </div>

    </form>

    <!--         End Register Form            -->
</div>
</div>
</div>
</div>
</div>
</div>
