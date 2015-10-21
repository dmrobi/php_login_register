<?php 
include 'core/init.php';
include 'includes/overall/header.php';
?>

		<div class="col-sm-9">
			<?php
                if(isset($_GET['success'])){
                    echo '<div class="alert alert-success">You\'ve been registered successfully. Verification URL sent your Email Address.</div>';
                }
            ?>
            <h1>Home</h1>
			<hr>
			<div>Just a template</div>

			<?php
				if(loged_in()){
					echo '<div>Loged in</div>';
				}else{
					echo '<div>Not loged in</div>';
				}
			?>

		</div><!--end blog-main -->
<?php include 'includes/overall/footer.php'; ?>