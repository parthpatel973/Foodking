<div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            
                        </div>  
                        <div class="panel-body" >
						<?php if(isset($_GET['msg'])){?>
							<div class="alert alert-danger">
								<?php echo $_GET['msg']; ?>
							</div>
						<?php } ?>
                            <form id="signupform" method="post" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                   
                       
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Full Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                                    </div>
                                </div>
                  
                  
                           <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea name="address" rows="3" cols="44"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">State</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="state" placeholder="State" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Postal Code</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="postalcode" placeholder="Postal Code" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
										
                                    </div>
                                </div>
                                    
                            <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" class="form-control" name="password_two" id="password_two" placeholder="Confirm Password" required>
										
                                    </div>
                                </div>
                                
                                      
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
									<input type="hidden" name="registerform" value="1">
                                        <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                       
                                    </div>
									
                                </div>
								
                                
             
                                
                                
                            </form>
							
                         </div>
                    </div>
					<div style="text-hand-right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="?p=login" ">Log in</a></div>
					</div>
					</div>
