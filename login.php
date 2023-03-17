<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="dist/css/login.css">

    <script type="text/javascript" src="dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/fontawesome-free/css/all.css">
    <script type="text/javascript" src="dist/fontawesome-free/js/all.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div>
					<?php include 'inc/msg.php'; ?>
				</div>
			</div>
			<div class="card-body">
				<form action="controller/user/process.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div>
					
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
</body>
</html>