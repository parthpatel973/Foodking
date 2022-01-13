<div class="container">
	<div class="row">
		<h2></h2>
	</div>
	<section class="section paddb20">

    <!--Section heading-->
    <h2 class="section-heading h1 pt-4">Feedback</h2>
    <!--Section description-->
    <p class="section-description">Do you have any questions? Please do not hesitate to contact us directly. </p> </br>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-8 col-xl-9">
            <?php if(isset($_GET['msg']) && $_GET['msg'] != ''){?>
                <div class="alert alert-success">Thank you for feedback.</div>
            <?php } ?>
            <form id="contact-form" name="contact-form" action="" method="post">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
						<label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                          
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
						<label for="email" class="">Your email</label>
                            <input type="email" id="email" name="email" class="form-control" required="">
                           
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
						<label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" required="">
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
						<label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            
                        </div>

                    </div>
                </div> </br>
                <!--Grid row-->
                <div class="center-on-small-only">
                    <input type="hidden" name="contactus" value="1">
                <input type="submit" name="submit" class="btn btn-primary" value="Send">  
            </div>

            </form>

            
            <div class="status"></div>
        </div>
        <!--Grid column-->

       
        <!--Grid column-->

    </div>

</section>
</div>
