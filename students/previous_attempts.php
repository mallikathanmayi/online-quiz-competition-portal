<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM results
        WHERE email='$email'
        ORDER BY quiz_id ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Previous Results</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f4f4;
}

.header{
    background:#007BFF;
    color:white;
    text-align:center;
    padding:20px;
}

.container{
    width:90%;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid #ddd;
}

th{
    background:#007BFF;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
}

tr:nth-child(even){
    background:#f9f9f9;
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
    padding:12px 25px;
    background:#007BFF;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.btn:hover{
    background:#0056b3;
}

</style>

</head>

<body>

<div class="header">
<h2>📊 Previous Results</h2>
</div>

<div class="container">

<table>

<tr>
<th>Round</th>
<th>Score</th>
<th>Total</th>
<th>Status</th>
</tr>

<?php

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

<a href="student.php" class="btn">
🏠 Back to Dashboard
</a>

</center>

</div>

</body>
</html>