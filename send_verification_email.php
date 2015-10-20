<?php 
include 'core/init.php';
loged_in_redirect();
if(empty($_POST)){
    loged_in_redirect();
}
include 'includes/overall/header.php';

$subject = "Email Verification";
$message = ' 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$_POST['username'].'
------------------------

Please click this link to activate your account:
http://www.logicpen.com/verify.php?email='.$email.'&hash='.$hash.'

';
$from = "From: LogicPen@logicpen.com";

mail($email, $subject, $message, $from);

?>

		<div class="col-sm-9">

<!-- Registration done message -->
<div>
    <?php
        if(isset($_GET['success'])){
            echo '<div class="alert alert-success">You\'ve been registered successfully. Verification URL sent your Email Address.</div>';
        }
    ?>
</div>
<!-- end Registration done message -->



		</div><!--end blog-main -->
<?php include 'includes/overall/footer.php'; ?>