<?php
session_start();
include "../db.php";

// Uncomment if you have admin session
/*
if(!isset($_SESSION['admin_id']))
{
    header("Location: admin_login.html");
    exit();
}
*/

$sql = "SELECT * FROM students ORDER BY student_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Students</title>

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
width:95%;
margin:30px auto;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0,.2);
overflow-x:auto;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#0d6efd;
color:white;
padding:12px;
}

table td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

table tr:nth-child(even){
background:#f8f9fa;
}

table tr:hover{
background:#e9f3ff;
}

.btn{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
}

.btn:hover{
background:#084298;
}

</style>

</head>

<body>

<div class="header">
<h1>Registered Students</h1>
</div>

<div class="container">

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>College</th>
<th>Branch</th>
<th>Year</th>
<th>Registered On</th>
</tr>

<?php

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td><?php echo htmlspecialchars($row['name']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td><?php echo htmlspecialchars($row['college']); ?></td>

<td><?php echo htmlspecialchars($row['branch']); ?></td>

<td><?php echo htmlspecialchars($row['year']); ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="8">No Students Registered</td>
</tr>

<?php
}
?>

</table>

<center>
<a href="admin_dashboard.php" class="btn">⬅ Back to Dashboard</a>
</center>

</div>

</body>
</html>