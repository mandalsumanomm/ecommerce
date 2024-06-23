<!-- <?php
session_start();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/ecommerce/assets/css/style.css"> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand me-5" href="#">E-commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/ecommerce/user/index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/user/contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/user/profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/user/register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/admin/add_product.php">Add Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/user/index.php">View page</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/admin/admin_profile.php">Admin Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/admin/logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ecommerce/user/message.php">Messages</a>
    </li>
    </ul>

    <form class="d-flex me-auto">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    <?php if (isset($_SESSION['username'])): ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>
<div class="container mt-4">
</div> 
