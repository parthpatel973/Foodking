	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Reset Password</h1>
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
				
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Reset Password</button>
                
				<input type="hidden" name="resetpassword" value="1">
               
                </form>
            </div>
            <a href="?p=adminlogin" class="text-left new-account"> Login </a>
        </div>
    </div>
</div>

