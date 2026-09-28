<?php
session_start();

if(!isset($_SESSION['student_id']))
{
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz Instructions</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f4f4;
}

.container{
    width:70%;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

h1{
    text-align:center;
    color:#007BFF;
}

ul{
    font-size:18px;
    line-height:35px;
}

.btn{
    display:inline-block;
    padding:12px 25px;
    background:#007BFF;
    color:white;
    text-decoration:none;
    border-radius:5px;
    margin:10px;
}

.btn:hover{
    background:#0056b3;
}

.center{
    text-align:center;
    margin-top:30px;
}

</style>

</head>

<body>

<div class="container">

<h1>📋 Quiz Instructions</h1>

<ul>

<li>The quiz consists of <b>3 rounds</b>.</li>

<li>Round 1 contains <b>20 questions</b>.</li>

<li>Round 2 contains <b>15 questions</b>.</li>

<li>Round 3 (Final Round) contains <b>10 questions</b>.</li>

<li>Each question carries <b>1 mark</b>.</li>

<li>There is <b>no negative marking</b>.</li>

<li>Read every question carefully before answering.</li>

<li>Do not refresh or close the browser during the quiz.</li>

<li>The quiz will be submitted automatically when the timer ends.</li>

<li>You must qualify in each round to proceed to the next round.</li>

<li>After completing the final round, your certificate will be generated automatically.</li>

</ul>

<div class="center">

<a href="round1.php" class="btn">
Start Quiz
</a>

<a href="student.php" class="btn">
Back to Dashboard
</a>

</div>

</div>

</body>
</html>