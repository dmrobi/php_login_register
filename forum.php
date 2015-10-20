<?php 
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>

		<div class="col-sm-9">
			<h1>Forum</h1>
			<hr>
			
			<?php if(loged_in()): ?>
			    <div>Just a template</div>    
			<?php endif; ?>
			
		</div><!--end blog-main -->

<?php include 'includes/overall/footer.php'; ?>