<?php
session_start();
include "../db.php";

if(!isset($_SESSION['student_id']))
{
    header("Location: login.html");
    exit();
}

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM students WHERE student_id='$student_id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_assoc($result);
}
else
{
    die("Student Not Found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Profile</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f6f9;
}

.header{
background:#0d6efd;
color:white;
padding:20px;
text-align:center;
}

.container{
width:700px;
margin:40px auto;
background:white;
border-radius:12px;
box-shadow:0 0 15px rgba(0,0,0,.2);
padding:30px;
}

.profile-img{
width:120px;
height:120px;
border-radius:50%;
display:block;
margin:auto;
border:4px solid #0d6efd;
}

h2{
text-align:center;
margin:15px 0;
color:#0d6efd;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

table td{
padding:14px;
border-bottom:1px solid #ddd;
font-size:17px;
}

.label{
font-weight:bold;
width:35%;
background:#f8f9fa;
}

.btn{
display:inline-block;
margin-top:25px;
padding:12px 25px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:6px;
}

.btn:hover{
background:#084298;
}

.center{
text-align:center;
}

</style>

</head>

<body>

<div class="header">
<h1>Student Profile</h1>
</div>

<div class="container">

<img src="student.png" class="profile-img">

<h2><?php echo htmlspecialchars($row['name']); ?></h2>

<table>

<tr>
<td class="label">Student ID</td>
<td><?php echo $row['student_id']; ?></td>
</tr>

<tr>
<td class="label">Full Name</td>
<td><?php echo htmlspecialchars($row['name']); ?></td>
</tr>

<tr>
<td class="label">Email</td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
</tr>

<tr>
<td class="label">Phone Number</td>
<td><?php echo htmlspecialchars($row['phone']); ?></td>
</tr>

<tr>
<td class="label">College</td>
<td><?php echo htmlspecialchars($row['college']); ?></td>
</tr>

<tr>
<td class="label">Branch</td>
<td><?php echo htmlspecialchars($row['branch']); ?></td>
</tr>

<tr>
<td class="label">Year</td>
<td><?php echo htmlspecialchars($row['year']); ?></td>
</tr>

<tr>
<td class="label">Registered On</td>
<td><?php echo $row['created_at']; ?></td>
</tr>

</table>

<div class="center">

<a href="student.php" class="btn">⬅ Back to Dashboard</a>

</div>

</div>

</body>
</html>