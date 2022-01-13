
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-sm-6 text-center">
            <?php if(isset($_GET['success'])){?>
                            <div class="alert alert-success">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" width="150px" src="<?php echo website; ?>image/profile/<?php echo $row['image'];?>">
                </div>
                <div class="info">
                   
                    <div class="desc"><?php echo $row['fullname'];?></div>
                    <div class="desc"><?php echo $row['email'];?></div>
                    <div class="desc"><?php echo $row['address'];?></div>
                    <div class="desc"><a class="btn btn-primary" href="?p=editinfo&id=<?php echo $row['id'];?>">Edit</a><a class="btn btn-primary" href="?p=changepsw&id=<?php echo $row['id'];?>">Change Password</a></div>
                </div>
               
            </div>

        </div>

	</div>
</div>