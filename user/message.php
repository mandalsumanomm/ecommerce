<?php
session_start();
include('../includes/header.php');
include('../includes/db.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM contacts WHERE id='$delete_id'";
    if ($conn->query($delete_sql) === TRUE) {
        $message = "Message deleted successfully.";
    } else {
        $message = "Error deleting message: " . $conn->error;
    }
}


$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

?>

<div class="container mt-4">
    <h2>Contact Messages</h2>
    <?php if (isset($message)): ?>
        <div class="alert alert-info">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        <td>
                            <a href="message.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No messages found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
