<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

$score = 0;
$total = 20;

$sql = "SELECT * FROM questions WHERE round=1";
$result = mysqli_query($conn,$sql);

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
VALUES('$email',1,$score,$total)");
?>

<!DOCTYPE html>
<html>
<head>
<title>Round 1 Result</title>
<style>
body{font-family:Arial;background:#f4f4f4;}
.container{
width:600px;
margin:60px auto;
background:#fff;
padding:30px;
text-align:center;
border-radius:10px;
box-shadow:0 0 10px gray;
}
.score{
font-size:45px;
color:green;
font-weight:bold;
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

<h1>Round 1 Result</h1>

<p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>

<div class="score">
<?php echo $score;?> / <?php echo $total;?>
</div>

<?php
if($score>=10)
{
?>

<h2 style="color:green;">Qualified for Round 2</h2>

<a href="round2.php" class="btn">
Proceed to Round 2
</a>

<?php
}
else
{
?>

<h2 style="color:red;">
Not Qualified
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