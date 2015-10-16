<?php
include 'includes/overall/header.php';
include 'core/init.php';
?>
<div class="col-sm-9">
<?php
if(empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) === true || empty($password) === true){
		$errors[] = '<div class="alert alert-danger">You need to enter username and password.</div>';
	}else if(user_exists($username) === false){
		$errors[] = '<div class="alert alert-danger">We can\'t find that username. Have you registered?</div>';
	}else if(user_active($username) === false){
		$errors[] = '<div class="alert alert-warning">You haven\'t activated your account!</div>';
	}else{
		$login = login($username, $password);
		if($login === false){
			$errors[] = '<div class="alert alert-danger">That username/password is incorrect</div>';
		}else{
			//set the user session
			$_SESSION['user_id'] = $login;
			$_SESSION['username'] = $username;
			//redirect user to home
			header('Location: index.php');
			exit();
		}
	}

	echo $errors[0];
}
?>
</div><!--end blog-main -->
<?php
include 'includes/overall/footer.php';
?>