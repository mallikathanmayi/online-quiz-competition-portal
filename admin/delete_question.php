<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM questions WHERE question_id='$id'");

    echo "<script>
    alert('Question Deleted Successfully');
    window.location='delete_question.php';
    </script>";
}

$result = mysqli_query($conn,"SELECT * FROM questions ORDER BY question_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete Questions</title>

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

h2{
    text-align:center;
    color:#007BFF;
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
    background:red;
    color:white;
    text-decoration:none;
    padding:8px 15px;
    border-radius:5px;
}

.back{
    display:inline-block;
    margin-top:20px;
    background:#007BFF;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="container">

<h2>Delete Questions</h2>

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
<a class="btn"
href="delete_question.php?id=<?php echo $row['question_id']; ?>"
onclick="return confirm('Are you sure you want to delete this question?');">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a href="admin_dashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>