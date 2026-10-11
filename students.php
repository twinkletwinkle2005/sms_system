<?php
session_start();
include "db.php";
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Student Records</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h2>Student Records</h2>
<table>
<tr><th>ID</th><th>Name</th><th>Phone</th></tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo htmlspecialchars($row["name"]); ?></td>
<td><?php echo htmlspecialchars($row["phone"]); ?></td>
</tr>
<?php } ?>
</table>
<a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>