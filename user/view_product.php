<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>


<link rel="stylesheet" href="/ecommerce/assets/css/view_product.css">

<div class="custom-container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<img src='../assets/images/" . $row['image'] . "' alt='Product Image' class='product-image'>";
            echo "</div>";
            echo "<div class='col-md-6 product-details'>";
            echo "<h2 class='product-title'>" . $row['name'] . "</h2>";
            echo "<p class='card-text'>" . $row['description'] . "</p>";
            echo "<p class='product-price'>$" . $row['price'] . "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Product not found.</p>";
        }
    } else {
        echo "<p>No product ID specified.</p>";
    }
    ?>
</div>

<?php include('../includes/footer.php'); ?>
