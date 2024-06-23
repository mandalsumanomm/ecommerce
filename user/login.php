<?php include('../includes/db.php'); ?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username']; // Set the username session variable
            header("Location: index.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ecommerce/assets/css/register.css">
  <title>Login</title>
</head>
<body>
<div class="login__card--container">
    <h2 class="register__heading">Login</h2>
    <div class="manual__login">
        <form class="manual__login--form" action="" method="post">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
            <button type="submit" class="btn btn--manual">Login</button>
        </form>
    </div>
    <hr class="seperate__line">
    <div class="create__account">
        Don't have an account? Register <a href="/ecommerce/user/register.php" class="signup__link">here</a>
    </div>
</div>
</body>
</html>
