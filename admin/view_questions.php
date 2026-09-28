<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

$sql = "SELECT * FROM questions ORDER BY question_id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Questions</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:#f2f2f2;
    margin:0;
}

.container{
    width:95%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

h2{
    text-align:center;
    color:#007BFF;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid #ccc;
}

th{
    background:#007BFF;
    color:white;
}

th,td{
    padding:10px;
    text-align:center;
}

.back{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#007BFF;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.back:hover{
    background:#0056b3;
}

</style>

</head>

<body>

<div class="container">

<h2>View Questions</h2>

<table>

<tr>
    <th>ID</th>
    <th>Quiz ID</th>
    <th>Question</th>
    <th>Option 1</th>
    <th>Option 2</th>
    <th>Option 3</th>
    <th>Option 4</th>
    <th>Answer</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['question_id']; ?></td>

<td><?php echo $row['quiz_id']; ?></td>

<td><?php echo $row['question']; ?></td>

<td><?php echo $row['option1']; ?></td>

<td><?php echo $row['option2']; ?></td>

<td><?php echo $row['option3']; ?></td>

<td><?php echo $row['option4']; ?></td>

<td><?php echo $row['answer']; ?></td>

</tr>

<?php
}
?>

</table>

<br>

<a href="admin_dashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>