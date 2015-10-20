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
			
            <h1>Change Password</h1>
			<div><?php echo output_err($errors); ?></div>
			<div>
                <?php
                    if(isset($_GET['success'])){
                        echo '<div class="alert alert-success">Your password has been updated.</div>';
                    }
                ?>
            </div>
			<hr>
			
			<div id="changepassword_form">
			    
			    <form action="" method="POST">
                    <fieldset>

                        <div class="control-group">
                            <!-- Current Password-->
                            <label class="control-label" for="current_password">Current Password*</label>
                            <div class="controls">
                                <input type="password" id="current_password" name="current_password" placeholder="" class="input-xlarge form-control">
                                <p class="help-block">Enter your current password.</p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <!-- New Password-->
                            <label class="control-label" for="password">New Password*</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge form-control">
                                <p class="help-block">Enter your new password.</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Confirm New Password -->
                            <label class="control-label"  for="password_confirm">Password (Confirm)*</label>
                            <div class="controls">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge form-control">
                                <p class="help-block">Please confirm new password.</p>
                            </div>
                        </div>

                        <hr>

                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success center-block">Change Password</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
			    
			</div><!-- end changepassword_form -->
			
		</div><!--end blog-main -->
<?php include 'includes/overall/footer.php'; ?>