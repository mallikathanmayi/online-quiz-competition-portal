<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

$id=$_GET['id'];

if(isset($_POST['update']))
{
    $question=$_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $answer=$_POST['answer'];

    mysqli_query($conn,"UPDATE questions SET
    question='$question',
    option1='$option1',
    option2='$option2',
    option3='$option3',
    option4='$option4',
    answer='$answer'
    WHERE question_id='$id'");

    echo "<script>
    alert('Question Updated Successfully');
    window.location='view_questions.php';
    </script>";
}

$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM questions WHERE question_id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Question</title>

<style>

body{
font-family:Arial;
background:#f2f2f2;
}

.container{
width:700px;
margin:30px auto;
background:white;
padding:20px;
border-radius:10px;
}

input,textarea{
width:100%;
padding:10px;
margin:10px 0;
}

button{
width:100%;
padding:12px;
background:#007BFF;
color:white;
border:none;
cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<h2 align="center">Update Question</h2>

<form method="POST">

<textarea name="question"><?php echo $row['question']; ?></textarea>

<input type="text" name="option1" value="<?php echo $row['option1']; ?>">

<input type="text" name="option2" value="<?php echo $row['option2']; ?>">

<input type="text" name="option3" value="<?php echo $row['option3']; ?>">

<input type="text" name="option4" value="<?php echo $row['option4']; ?>">

<input type="text" name="answer" value="<?php echo $row['answer']; ?>">

<button type="submit" name="update">Update Question</button>

</form>

</div>

</body>
</html>