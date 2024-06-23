<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <div class="row">
        <?php
        // Query to fetch products from database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-3'>";
                echo "<div class='card mb-3'>";
                echo "<img class='card-img-top' src='../assets/images/" . $row['image'] . "' alt='Product Image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                echo "<p class='card-text'>Description: " . $row['description'] . "</p>";
                echo "<p class='card-text'>Price: $" . $row['price'] . "</p>";
                echo "<a href='view_product.php?id=" . $row['id'] . "' class='btn btn-primary'>View Product</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No products available.";
        }
        ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
