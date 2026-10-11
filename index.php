<?php
session_start();
include "db.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>SMS System Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="box">
<h2>SMS Management System</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>
<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
<p>Demo login: <b>admin</b> / <b>1234</b></p>
</div>
</body>
</html>