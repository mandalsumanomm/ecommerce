<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "../assets/images/" . basename($image);

    if ($image) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id='$id'";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required><?php echo $row['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<?php include('../includes/footer.php'); ?>
