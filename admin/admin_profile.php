<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

// Handle delete product request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM products WHERE id='$delete_id' AND admin_id='$admin_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

// Fetch admin information
$sql_admin = "SELECT * FROM admins WHERE id='$admin_id'";
$result_admin = $conn->query($sql_admin);
$admin = $result_admin->fetch_assoc();

// Fetch products added by admin
$sql_products = "SELECT * FROM products WHERE admin_id='$admin_id'";
$result_products = $conn->query($sql_products);
?>

<div class="container">
    <h2 class="mt-4">Admin Profile</h2>
    <div class="mb-4">
        <h5>Profile Information</h5>
        <p>Username: <?php echo $admin['username']; ?></p>
       
    </div>

    <h3>Added Products</h3>
    <div class="row">
        <?php
        if ($result_products->num_rows > 0) {
            while($row = $result_products->fetch_assoc()) {
                echo "<div class='col-md-3 mb-4'>";
                echo "<div class='card' style='width: 18rem;'>";
                echo "<img class='card-img-top' src='../assets/images/" . $row['image'] . "' alt='Product image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                echo "<p class='card-text'>" . $row['description'] . "</p>";
                echo "<p class='card-text'>$" . $row['price'] . "</p>";
                echo "<a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                echo "<a href='admin_profile.php?delete_id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No products added.</p>";
        }
        ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
