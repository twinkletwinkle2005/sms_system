<?php
session_start();
include "db.php";
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $sql = "INSERT INTO students (name, phone) VALUES ('$name', '$phone')";
    $message = mysqli_query($conn, $sql) ? "Student added successfully." : "Error adding student.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Student</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h2>Add Student</h2>
<?php if (isset($message)) echo "<p>$message</p>"; ?>
<form method="POST">
<label>Student Name</label><input type="text" name="name" required>
<label>Phone Number</label><input type="text" name="phone" required>
<button type="submit" name="add">Add Student</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>