<?php //echo "<pre>"; print_r($mail_data); echo $mail_data['email'];exit; ?>


<!DOCTYPE html>
<html>
<head>
    <title>Your Password Is Bellow</title>
</head>
<body>
    <h2>Hello,  <?php echo $mail_data['C_Email'];?> </h2>
    <p>Your Password is: <strong> <?php echo $mail_data['C_Password'];?></strong></p>
   
    <p>If you did not request this, please ignore this email.</p>
    <p>Thank you!</p>
</body>
</html>