<?php
session_start();
include ("../db.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION['admin'] = $username;

    header("Location: admin_dashboard.php");
    exit();
}
else
{
    echo "<script>
    alert('Invalid Username or Password');
    window.location='admin_login.html';
    </script>";
}
?>