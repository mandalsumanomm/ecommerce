<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        //echo "New admin registered successfully.";
        header('location:/ecommerce/admin/admin_login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary my-4">Register</button>
</form>

<?php include('../includes/footer.php'); ?>
