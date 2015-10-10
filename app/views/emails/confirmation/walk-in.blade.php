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
			<p>Thank you for choosing Kalugdan Garden Resort, we are happy for your reservation. The system automatically created an account for you, so that you can easily manage your reservation in our website. Please see information below for your log-in credentials:</p>
			<br>
			<br>
			<p>Email/username: {{$email}}</p>
			<p>Password: {{$tempPass}} </p>
			<br>
			<br>
			<p>Verification code: <a href= "{{ $link }}">Verification Link</a></p>
		</div>
	</div>
</div>

</body>


</html>