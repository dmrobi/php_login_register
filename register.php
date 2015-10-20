<?php
include 'core/init.php';
loged_in_redirect();
include 'includes/overall/header.php';

if(empty($_POST) === false){
    $required_fields = array('username','password','password_confirm','first_name','email');
    
    foreach($_POST as $key=>$value){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = '<div class="alert alert-danger">Fields marked with * are required.</div>';
            break 1;
        }
    }
    
    if(empty($errors) === true){
        
        //Username Validation
        if(strlen($_POST['username']) < 6){
            $errors[] = '<div class="alert alert-danger">Username must be at least 6 Charecters.</div>';
        }else{
            if(user_exists($_POST['username']) === true){
                $errors[] = '<div class="alert alert-danger">Sorry, the username \''.$_POST['username']. '\' is already taken.</div>';
            }

            if(preg_match("/\\s/", $_POST['username']) == true){
                $regular_expression = preg_match("/\\s/", $_POST['username']);
                var_dump($regular_expression);
                $errors[] = '<div class="alert alert-danger">Username should not contain any space.</div>';
            }
        }
        
        //Passwod Validation
        if(strlen($_POST['password']) < 6){
            $errors[] = '<div class="alert alert-danger">Password must be at least 6 Charecters.</div>';
        }else{
            if($_POST['password'] !== $_POST['password_confirm']){
                $errors[] = '<div class="alert alert-danger">Password does not match.</div>';
            }
        }
        
        // Email Validation
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = '<div class="alert alert-danger">Invalid email, please insert your correct email address.</div>';
        }else{
            if(email_exists($_POST['email'])){
                $errors[] = '<div class="alert alert-danger">Sorry, the email \''.$_POST['email']. '\' is already in use.</div>';
            }   
        }
        
        //Form Submission
        if(empty($errors)){
            $hash = md5(rand(0, 1000));
            $register_data = array(
                'username'      => $_POST['username'],
                'password'      => $_POST['password'],
                'first_name'    => $_POST['first_name'],
                'last_name'     => $_POST['last_name'],
                'email'         => $_POST['email'],
                'hash'         => $hash
                
            );
            
            register_user($register_data);
            //Redirect
            header('Location: index.php?success');
            send_verification_email($_POST['email'], $hash);
            exit();
        }
        
    }
}

?>

		<div class="col-sm-9">
			<h1>User Registration</h1>
			<div><?php echo output_err($errors); ?></div>
            
            <hr>
			<form action="" method="POST">
                <fieldset>

                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label" for="username">Username*</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Username should be at least 6 characters without any space.</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password*</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Password should be at least 6 characters</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password -->
                        <label class="control-label"  for="password_confirm">Password (Confirm)*</label>
                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Please confirm password</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- First Name -->
                        <label class="control-label"  for="first_name">First Name*</label>
                        <div class="controls">
                            <input type="text" id="first_name" name="first_name" placeholder="" class="input-xlarge form-control">
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Last Name -->
                        <label class="control-label"  for="last_name">Last Name</label>
                        <div class="controls">
                            <input type="text" id="last_name" name="last_name" placeholder="" class="input-xlarge form-control">
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail*</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>

                    <hr>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success center-block">Register</button>
                        </div>
                    </div>

                </fieldset>
            </form>
			
		</div><!--end Registration -->
		
<?php include 'includes/overall/footer.php'; ?>