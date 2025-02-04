<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_admin";

$conn = new mysqli($servername, $username, $password, $dbname);
//Register
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
//Check if name exist
     $check_username_sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose another one.";
    } else {
    //Adds username password and role into user database
    $sql = "INSERT INTO user(username, password, role) VALUES ('$username', '$password', '$role')";
        
    if ($conn->query($sql) === TRUE) {
        echo "Registration Successful.";
    } else {
        echo "Error: " . $conn->error;
    }
}
}
//Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $data = $conn->query($sql);

    if ($row = $data->fetch_assoc()) {
 
        if ($password == $row['password']) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            echo "username: " . $row['username'] . "<br>";

            if ($row['role'] === 'admin') {
                echo "Welcome Admin";
            } else {
                echo "Welcome User";
            }
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }
}
$conn->close();
?>
 <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
       <h3><a href="panel_dashboard.php">Admin Panel</a></h3>
       <p>Only accessible by admins.</p>
    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
        <h3><a href="panel_dashboard.php">User Dashboard</a></h3>
        <p>Welcome to your user dashboard!</p>
    <?php endif; ?>
