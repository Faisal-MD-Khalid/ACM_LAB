<?php
// Establish connection to database
$mysqli = new mysqli('localhost', 'root', '', 'acmlab');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if(isset($_POST['submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$md5password 	= md5($password);


	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
if ($password != $confirm_password) {
    die("Passwords do not match");
}

$sql = "SELECT * FROM user WHERE username='$username' OR users_email='$email'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	echo "Username or email already in use";
}
else if ($password != $confirm_password) {
    echo "Passwords do not match";
}


else{

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, users_email, users_password)
        VALUES ('$username', '$email', '$md5password')";

if ($mysqli->query($sql) === TRUE) {
	echo "Account created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

	

// Close connection
$mysqli->close();
}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="stl.css">
</head>
<body>

	<div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP">

				</form>
				<p>Already have an account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		
		<div class="colorlibcopy-agile">
		
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

</body>
</html>