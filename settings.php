<?php 
include 'core/init.php';
protect_page();

// Change Password form Validation and Submit....
if(empty($_POST) === false){
    $required_fields = array('current_password','password','password_confirm');
    
    foreach($_POST as $key=>$value){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = '<div class="alert alert-danger">Fields marked with * are required.</div>';
            break 1;
        }
    }
    
    if(empty($errors) === true){
        
        //Check current password
        if(md5($_POST['current_password']) !== $user_data['password']){
            $errors[] = '<div class="alert alert-danger">Your current password is incorrect.</div>';
        }else{
            
            //New Passwod Validation
            if(strlen($_POST['password']) < 6){
                $errors[] = '<div class="alert alert-danger">Password must be at least 6 Charecters.</div>';
            }else{
                if($_POST['password'] !== $_POST['password_confirm']){
                    $errors[] = '<div class="alert alert-danger">Password does not match.</div>';
                }
            }
            
        }
        
        //Form Submission
        if(empty($errors)){
            change_password($_POST['password'], $session_user_id);
            //Redirect
            header('Location: changepassword.php?success');
            exit();
        }
        
    }
}//end change password form validation and submit

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
                            <label class="control-label" for="first_name">First Name</label>
                            <div class="controls">
                                <input type="text" id="first_name" name="first_name" placeholder="Robiul Islam" class="input-xlarge form-control">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <!-- Last Name -->
                            <label class="control-label" for="last_name">Last Name</label>
                            <div class="controls">
                                <input type="text" id="last_name" name="last_name" placeholder="Robi" class="input-xlarge form-control">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <!-- Last Name -->
                            <label class="control-label" for="email">Email*</label>
                            <div class="controls">
                                <input type="email" id="email" name="email" placeholder="dmrobi89@gmail.com" class="input-xlarge form-control">
                                <p class="help-block">If you change current email then your account will be Deactivated and you will need to Verify your new Email and Activate account again.</p>
                            </div>
                        </div>
                        
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