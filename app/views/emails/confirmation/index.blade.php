<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css">
<!-- Optional: Include the jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Titillium+Web:600,400' rel='stylesheet' type='text/css'>

<style>
body {
font-family: 'Titillium Web', sans-serif !important;
}
</style>

</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			
			<p>Hello {{$username}}</p>
			<p>Thank you for registering with us in Kalugdan Garden Resort, we are happy for your registration. You are one step closer to using our services. To finish your registration please click on the verification link below:</p>
			<br>
			<br>
			<br>
			<br>
			<p>Verification code: <a href= "{{ $link }}">Verification Link</a></p>
			<br>
			<br>
			<p> Please contact us for the  proof of payment once the payment is done in order to confirm your reservation. Once we confirm your payment you will recieve a confirmation email or textmessage.</p><br>
			<p>Sincerely,</p><br>
			<p> Kalugdan Garden Resort</p><br>
			<p>Mode of Payment</p><br>
		     <p>Please pay to any BDO Branches</p><br>
		     <p> BDO Account Name: Kalugdan Garden Resort</p><br>
		     <p> BDO Account Number: 0011-2015-1234</p><br>
		     <p> Please Contact Us: 09207605857/09065325913</p><br>
		     <p> Email Address: 14kalugdangardenresort@gmail.com</p><br>







		</div>
	</div>
</div>

</body>


</html>