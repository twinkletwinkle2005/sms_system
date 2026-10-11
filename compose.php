<?php
session_start();
include "db.php";
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST["send"])) {
    $student_id = $_POST["student_id"];
    $message = $_POST["message"];
    $sql = "INSERT INTO messages (student_id, message) VALUES ('$student_id', '$message')";
    $notice = mysqli_query($conn, $sql) ? "Message saved to history successfully." : "Error saving message.";
}
$students = mysqli_query($conn, "SELECT * FROM students ORDER BY name");
?>
<!DOCTYPE html>
<html>
<head><title>Compose SMS</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h2>Compose SMS</h2>
<?php if (isset($notice)) echo "<p>$notice</p>"; ?>
<form method="POST">
<label>Select Student</label>
<select name="student_id" required>
<option value="">Select Student</option>
<?php while ($row = mysqli_fetch_assoc($students)) { ?>
<option value="<?php echo $row["id"]; ?>">
<?php echo htmlspecialchars($row["name"]) . " - " . htmlspecialchars($row["phone"]); ?>
</option>
<?php } ?>
</select>
<label>Message</label>
<textarea name="message" rows="6" required></textarea>
<button type="submit" name="send">Save SMS</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>