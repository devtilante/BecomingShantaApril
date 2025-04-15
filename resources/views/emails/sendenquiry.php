<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Shanta</title>
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
         Dear  <?php echo $mail_data['full_name'];?>
     	 <p>Welcome to <strong>Becoming Shanta,</strong> your sanctuary for growth, balance, and holistic well-being. We’re honored to be a part of your journey toward healing, self-discovery, and personal transformation.</p>
     	 <p>Whether you’re here to:</p>
     	 <ul>
     	 	<li>Nurture your emotional well-being,</li>
     	 	<li>Explore transformative practices, or</li>
     	 	<li>Seek clarity and connection,</li>
     	 </ul>
     	 <p>Our experienced practitioners are ready to guide you every step of the way.</p>
     	 <p><strong>Here’s how to take your next step toward Becoming Shanta:</strong></p>
     	 <ul>
     	 	<li>Already know which consultant you want to book with? [Book Now]</li>
     	 	<li>Have a service in mind? [Explore Services]</li>
     	 </ul>
     	 <br>
     	 <ul class="email-pass">
     	 	<li><span>Your Registered Email ID:</span> <?php echo $mail_data['email'];?></li>
     	 	<li><span>Password:</span> <?php echo $mail_data['pass_word'];?></li>
     	 </ul>
     	 <p>We can’t wait to support you on this path of growth and healing.</p>
     	 <br>
     	 <p class="mb-0">Here for you,</p>
     	 <p>The Becoming Shanta Team</p>
     </div>
</body>
</html>