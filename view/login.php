	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Log in</h1>
            <div class="account-wall">
               
					<?php if(isset($_GET['msg'])){?>
							<div class="alert alert-danger">
								<?php echo $_GET['msg']; ?>
							</div>
						<?php } ?>
                <form class="form-signin" action="" method="post">
				<div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                </div>                     
                <input type="password" class="form-control" name="password" placeholder="Password" required>
				
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Log in</button>
                
				<input type="hidden" name="loginform" value="1">
               
                </form>
            </div>
            <a href="?p=register" class="text-left new-account"> Create an account </a><a id="register" href="?p=register" ></a>  <a href="?p=resetpassword"class="text-right new-account">Reset password</a>
        </div>
    </div>
</div>

