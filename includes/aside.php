<div class="col-sm-3">
	<?php 
	if(loged_in()){
		include 'includes/widgets/loged_in.php';
	}else{
		include 'includes/widgets/login.php';
	}

	?>
</div><!-- end blog-sidebar -->