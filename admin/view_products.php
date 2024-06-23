<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card' style='width: 18rem;'>";
        echo "<img class='card-img-top' src='/assets/images/" . $row['image'] . "' alt='Product image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
        echo "<p class='card-text'>" . $row['description'] . "</p>";
        echo "<p class='card-text'>$" . $row['price'] . "</p>";
        echo "<a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
        echo "<a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No products available.";
}
?>

<?php include('../includes/footer.php'); ?>
