<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
// session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>Profile</h1>";
    echo "<p>Username: " . $row['username'] . "</p>";
    echo "<p>Email: " . $row['email'] . "</p>";
} else {
    echo "User not found.";
}
?>

<?php include('../includes/footer.php'); ?>
