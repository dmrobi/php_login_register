<div class="col-sm-3">
	<?php 
	if(loged_in()){
		include 'includes/widgets/loged_in.php';
	}else{
		include 'includes/widgets/login.php';
	}
    
    include 'includes/widgets/user_count.php';

	?>
</div><!-- end blog-sidebar -->