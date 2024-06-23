
<?php include('../includes/db.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {     
        header('location:/ecommerce/user/login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ecommerce/assets/css/register.css">
  <title>Register</title>
</head>
<body>
<div class="login__card--container">
	
		<h2 class="register__heading">Register</h2>
		

	<div class="manual__login">
		<form class="manual__login--form" method="post" action="">
    <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required> 
    <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
			
			<button type="submit" class="btn btn--manual">Register</button>
		</form>
	</div>

	<hr class="seperate__line">

	<div class="create__account">
		Do you have an account? Login <a href="/ecommerce/user/login.php" class="signup__link">here</a>
	</div>
</div>
</body>
</html>