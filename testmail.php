<?php
$to = "dmrobi89@gmail.com";
$subject = "Email Verification";
$txt = "Please use this link to activate your account.";
$headers = "From: LogicPen@example.com";
mail($to, $subject, $txt, $headers);

?>