<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM questions ORDER BY question_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Questions</title>

<style>
body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:95%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

table{
    width:100%;
    border-collapse:collapse;
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

.btn{
    background:green;
    color:white;
    padding:8px 15px;
    text-decoration:none;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="container">

<h2 align="center">Edit Questions</h2>

<table>

<tr>
<th>ID</th>
<th>Question</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['question_id']; ?></td>

<td><?php echo $row['question']; ?></td>

<td>
<a class="btn" href="update_question.php?id=<?php echo $row['question_id']; ?>">
Edit
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>