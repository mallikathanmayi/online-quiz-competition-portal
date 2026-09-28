<?php
session_start();
include "../db.php";

// Admin login check (optional)
// if(!isset($_SESSION['admin']))
// {
//     header("Location: admin_login.html");
//     exit();
// }

$sql = "SELECT * FROM results ORDER BY email, quiz_id";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Results</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f6f9;
}

.header{
    background:#0d6efd;
    color:white;
    text-align:center;
    padding:20px;
}

.container{
    width:95%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

table{
    width:100%;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid #ddd;
}

th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
}

tr:nth-child(even){
    background:#f8f9fa;
}

.pass{
    color:green;
    font-weight:bold;
}

.fail{
    color:red;
    font-weight:bold;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 25px;
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
<h1>📊 Student Quiz Results</h1>
</div>

<div class="container">

<table>

<tr>
<th>S.No</th>
<th>Email</th>
<th>Round</th>
<th>Score</th>
<th>Total</th>
<th>Status</th>
</tr>

<?php

$i=1;

while($row=mysqli_fetch_assoc($result))
{

if($row['quiz_id']==1)
{
    $round="Round 1";
    $pass=10;
}
elseif($row['quiz_id']==2)
{
    $round="Round 2";
    $pass=9;
}
else
{
    $round="Final Round";
    $pass=6;
}

?>

<tr>

<td><?php echo $i++; ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo $round; ?></td>

<td><?php echo $row['score']; ?></td>

<td><?php echo $row['total_questions']; ?></td>

<td>

<?php
if($row['score'] >= $pass)
{
    echo "<span class='pass'>Qualified</span>";
}
else
{
    echo "<span class='fail'>Not Qualified</span>";
}
?>

</td>

</tr>

<?php
}
?>

</table>

<center>

<a href="admin_dashboard.html" class="btn">
⬅ Back to Dashboard
</a>

</center>

</div>

</body>
</html>