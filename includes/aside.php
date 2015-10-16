<div class="col-sm-3">
	<?php 
	if(loged_in()){
		echo '<div class=\'thumbnail\'><div class=\'caption\'>';
		echo '<h4>Loged in as </h4>'. $_SESSION['username'];
		echo '<hr>';
		echo '<div class="text-center"><a href="logout.php">Logout</a></div>';
		echo '</div></div>';
	}else{
		include 'includes/widgets/login.php';
	}

	?>
</div><!-- end blog-sidebar -->