<div class="container">
    <div class="row"></br></br></br>
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">ADMIN LOGIN</h1>
            <div class="account-wall">
               
         <h4 class="text-center">Please enter your User ID and password</h4>
       <?php if(isset($error) && $error != ''){?>
       <div class="alert alert-danger"><?php echo $error; ?></div>
       <?php } ?>
                <form class="form-signin" action="" method="post">
        <div class="form-group">
                <div class="form-group">

      <label class="control-label">User Id</label>
            <input type="text" name="admin_user_id" id="inputEmail" class="form-control" placeholder="User id" size="20">

        </div>

        <div class="form-group">
      <label class="control-label">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"  size="20">

        </div>
        
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Log in</button>
                
        <input type="hidden" name="loginform" value="1">
               
                </form>
            </div>
            <a href="?p=resetpassword"class="text-right new-account">Reset password</a>
        </div>
    </div>
</div>

