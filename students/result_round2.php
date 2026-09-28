<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$email=$_SESSION['email'];

$score=0;
$total=15;

$sql="SELECT * FROM questions WHERE round=2";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
$qid=$row['question_id'];

if(isset($_POST["q$qid"]))
{
if($_POST["q$qid"]==$row['answer'])
{
$score++;
}
}
}

mysqli_query($conn,"INSERT INTO results(email,quiz_id,score,total_questions)
VALUES('$email',2,$score,$total)");
?>

<!DOCTYPE html>
<html>
<head>
<title>Round 2 Result</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
}

.container{
width:600px;
margin:60px auto;
background:white;
padding:30px;
text-align:center;
border-radius:10px;
box-shadow:0 0 10px gray;
}

.score{
font-size:45px;
font-weight:bold;
color:green;
}

.btn{
padding:12px 25px;
background:#007BFF;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<div class="container">

<h1>Round 2 Result</h1>

<p>
<b>Email :</b>

<?php echo htmlspecialchars($email);?>
</p>

<div class="score">

<?php echo $score;?> / <?php echo $total;?>

</div>

<?php

if($score>=12)
{

?>

<h2 style="color:green;">

Qualified for Final Round

</h2>

<a href="round3.php" class="btn">

Proceed to Final Round

</a>

<?php

}

else

{

?>

<h2 style="color:red;">

Eliminated in Round 2

</h2>

<a href="student.php" class="btn">

Dashboard

</a>

<?php

}

?>

</div>

</body>
</html>