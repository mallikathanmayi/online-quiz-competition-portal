<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

if(isset($_POST['submit']))
{
    $quiz_id=$_POST['quiz_id'];
    $question=$_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $answer=$_POST['answer'];

    $sql="INSERT INTO questions
    (quiz_id,question,option1,option2,option3,option4,answer)
    VALUES
    ('$quiz_id','$question','$option1','$option2','$option3','$option4','$answer')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Question Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to Add Question');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Question</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
}

.container{
    width:700px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

h2{
    text-align:center;
    color:#0d6efd;
}

input,textarea,select{
    width:100%;
    padding:10px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
    background:#0d6efd;
    color:white;
    border:none;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:#084298;
}

.back{
    display:block;
    text-align:center;
    margin-top:20px;
}

</style>

</head>

<body>

<div class="container">

<h2>Add New Question</h2>

<form method="POST">

<label>Quiz ID</label>
<input type="number" name="quiz_id" required>

<label>Question</label>
<textarea name="question" required></textarea>

<label>Option 1</label>
<input type="text" name="option1" required>

<label>Option 2</label>
<input type="text" name="option2" required>

<label>Option 3</label>
<input type="text" name="option3" required>

<label>Option 4</label>
<input type="text" name="option4" required>

<label>Correct Answer</label>
<input type="text" name="answer" required>

<button type="submit" name="submit">Add Question</button>

</form>

<div class="back">
<a href="admin_dashboard.php">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>