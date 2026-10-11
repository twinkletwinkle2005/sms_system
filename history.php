<?php
session_start();
include "db.php";
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
$sql = "SELECT messages.id, students.name, students.phone, messages.message, messages.sent_at
        FROM messages
        INNER JOIN students ON messages.student_id = students.id
        ORDER BY messages.id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>Message History</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h2>Message History</h2>
<table>
<tr><th>ID</th><th>Student</th><th>Phone</th><th>Message</th><th>Date & Time</th></tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo htmlspecialchars($row["name"]); ?></td>
<td><?php echo htmlspecialchars($row["phone"]); ?></td>
<td><?php echo htmlspecialchars($row["message"]); ?></td>
<td><?php echo $row["sent_at"]; ?></td>
</tr>
<?php } ?>
</table>
<a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>