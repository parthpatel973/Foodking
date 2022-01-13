<div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Edit info</div>
                            
                        </div>  
                        <div class="panel-body" >
						<?php if(isset($_GET['msg'])){?>
							<div class="alert alert-danger">
								<?php echo $_GET['msg']; ?>
							</div>
						<?php } ?>
                            <form id="signupform" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                   
                       
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Full Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $row['fullname'];?>" required>
                                    </div>
                                </div>
                  
                  
                           <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" value="<?php echo $row['email'];?>" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label for="email"  class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea name="address" rows="3" cols="44"><?php echo $row['address'];?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">State</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $row['state'];?>" name="state" placeholder="State" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo $row['city'];?>" class="form-control"  name="city" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname"  class="col-md-3 control-label">Postal Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" pattern="[0-9]{6}" value="<?php echo $row['postalcode'];?>" name="postalcode" placeholder="Postal Code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname"  class="col-md-3 control-label">Profile image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control"  name="profilenew" >
                                        <input type="hidden" name="oldprofile" value="<?php echo isset($row['image'])?$row['image']:''; ?>">
                                    </div>
                                </div>
                                
                                
                                      
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
									<input type="hidden" name="registerform" value="1">
                                        <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i> &nbsp Edit</button>
                                       
                                    </div>
									
                                </div>
								
                                
             
                                
                                
                            </form>
							
                         </div>
                    </div>
					</div>
					</div>
