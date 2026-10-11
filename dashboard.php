<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h1>SMS Management System</h1>
<h3>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h3>
<a class="menu" href="add_student.php">Add Student</a>
<a class="menu" href="students.php">View Students</a>
<a class="menu" href="compose.php">Compose SMS</a>
<a class="menu" href="history.php">Message History</a>
<a class="menu" href="logout.php">Logout</a>
</div>
</body>
</html>