

<?php //echo "<pre>"; print_r($mail_data['bookingDet']); ;exit; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking</title>
</head>
<body style="font-family: poppins;">
	<style type="text/css">
		p{
			margin-top: 5px;
			margin-bottom: 10px;
		}
		.mb-0{
			margin-bottom: 0;
		}
		.mail-body{
			padding: 20px 50px;
			margin: 20px 40px;
			border: 1px solid #ddd;
			border-radius: 10px;
		}
		.email-pass{
			padding-left: 0;
		}
		.email-pass  li{
			list-style: none;
		}
		.email-pass  li span{
			font-weight: 600;
		}
	</style>
     <div class="mail-body" style="padding: 20px 50px;
			margin: 20px 40px;
			border: 1px solid #ddd;
			border-radius: 10px;">
     	<h4>Hi,Admin</h4>
     	 <p>New Booking has been submited from shanta, Details are bellow: </p>
     	 <ul>
     	 	<li><strong>Consultant Name:</strong> <?php echo $mail_data['consultant_name'];?></li>
     	 	<li><strong>Consultant Email:</strong> <?php echo $mail_data['consultant_email'];?></li>
     	 	<li><strong>Consultant Phone:</strong> <?php echo $mail_data['consultant_phone'];?></li>
     	 	
     	 	<li><strong>Booking Date:</strong> Booking Time</li>
     	 	<?php foreach($mail_data['bookingDet'] as $bookingdet){ ?>
     	 	<li><strong><?php echo $bookingdet->date;?></strong> <?php echo $bookingdet->sloat_name;?></li>
     	 	 <?php } ?>
     	 	<!--<li><strong>Therapist:</strong> [Therapist Name]</li>-->
     	 </ul>
     	 <p>Read about our booking policy here.</p>
     	 <p>If you require any assistance with this booking, please reach out to us over WhatsApp at +91 90197 16005.</p>
     	 <br>
     	 <p class="mb-0">With care,</p>
     	 <p>Team Shanta</p>
     </div>
</body>
</html>