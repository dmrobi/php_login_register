<?php 
include 'core/init.php';
include 'includes/overall/header.php';
?>

		<div class="col-sm-9">
			
            <h1>Sorry! You need to be loged in to do that.</h1>
            <hr>
			<div>
                <p class="text-center">Please register or Login to visit protected content.</p>
                <a href="register.php"><button class="btn btn-primary center-block">New User Registration</button></a>
            </div>

			<?php
//				if(loged_in()){
//					echo '<div>Loged in</div>';
//				}else{
//					echo '<div>Not loged in</div>';
//				}
			?>

		</div><!--end blog-main -->
<?php include 'includes/overall/footer.php'; ?>