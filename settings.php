<?php 
include 'core/init.php';
protect_page();

//code to validate and update settings....
if(!empty($_POST)){
    $required_fields = array('first_name', 'email');
    
    foreach($_POST as $key=>$value){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = '<div class="alert alert-danger">Fields marked with * are required.</div>';
            break 1;
        }
    }
    
    if(empty($errros)){
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = '<div class="alert alert-danger">Invalid email, please insert your correct email address.</div>';
        }else if(email_exists($_POST['email']) && $_POST['email'] !== $user_data['email']){
            $errors[] = '<div class="alert alert-danger">The email you entered \''.$_POST['email'].'\' is already in use.</div>';
        }
        
        if(empty($errros)){
            $update_data = array(
                'first_name'    => $_POST['first_name'],
                'last_name'     => $_POST['last_name'],
                'email'         => $_POST['email']
            );
            
            update_user_data($update_data, $session_user_id);
            //Redirect
            header('Location: settings.php?success');
            //email($_POST['email'], $hash);
            exit();
        }
    }
}

include 'includes/overall/header.php';
?>

		<div class="col-sm-9">
			
            <h1>Account Settings</h1>
			<div><?php echo output_err($errors); ?></div>
			<div>
                <?php
                    if(isset($_GET['success'])){
                        echo '<div class="alert alert-success">New settings has been set.</div>';
                    }
                ?>
            </div>
			<hr>
			
			<div id="changepassword_form">
			    
			    <form action="" method="POST">
                    <fieldset>

                        <div class="control-group">
                            <!-- Frist Name -->
                            <label class="control-label" for="first_name">First Name*</label>
                            <div class="controls">
                                <input type="text" id="first_name" name="first_name" value="<?php echo $user_data['first_name'] ?>" class="input-xlarge form-control">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <!-- Last Name -->
                            <label class="control-label" for="last_name">Last Name</label>
                            <div class="controls">
                                <input type="text" id="last_name" name="last_name" value="<?php echo $user_data['last_name'] ?>" class="input-xlarge form-control">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <!-- Last Name -->
                            <label class="control-label" for="email">Email*</label>
                            <div class="controls">
                                <input type="email" id="email" name="email" value="<?php echo $user_data['email'] ?>" class="input-xlarge form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success center-block">Save Changes</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
			    
			</div><!-- end changepassword_form -->
			
		</div><!--end blog-main -->
<?php include 'includes/overall/footer.php'; ?>