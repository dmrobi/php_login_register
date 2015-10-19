<div class="thumbnail">
	<div class="caption">
		<h4>Total Users</h4>
		<div>
		    <?php
                $all_user_count = user_count("all");
                $active_user_count = user_count("active");
                $inactive_user_count = user_count("inactive");
                
                $suffix = ($all_user_count != 1) ? 's' : '';
            
            ?>
            <div>We have <?php echo $all_user_count; ?> registered user<?php echo $suffix; ?>.</div>
            <div>Active: <?php echo $active_user_count; ?></div>
            <div>Inactive: <?php echo $inactive_user_count; ?></div>
		</div>
	</div>
</div><!-- end widget -->