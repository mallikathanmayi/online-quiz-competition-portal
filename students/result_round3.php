<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

$score = 0;
$total = 10;

// Round 3 Questions
$sql = "SELECT * FROM questions WHERE round=3";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    $qid = $row['question_id'];

    if (isset($_POST["q$qid"])) {

        if ($_POST["q$qid"] == $row['answer']) {
            $score++;
        }
    }
}

// Save Final Result
mysqli_query($conn,"INSERT INTO results(email,quiz_id,score,total_questions)
VALUES('$email',3,'$score','$total')");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Final Result</title>

<style>

body{
margin:0;
font-family:Arial,sans-serif;
background:#f4f7fc;
}

.container{
width:650px;
margin:60px auto;
background:#fff;
padding:35px;
border-radius:12px;
box-shadow:0 0 15px rgba(0,0,0,.2);
text-align:center;
}

h1{
color:#0d6efd;
}

.score{
font-size:55px;
font-weight:bold;
color:#198754;
margin:20px 0;
}

.message{
font-size:22px;
font-weight:bold;
color:#28a745;
margin-bottom:25px;
}

.btn{
display:inline-block;
padding:12px 25px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:6px;
margin:10px;
font-size:18px;
}

.btn:hover{
background:#084298;
}

.footer{
margin-top:25px;
color:#555;
}

</style>

</head>

<body>

<div class="container">

<h1>🏆 Final Result</h1>

<p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>

<div class="score">
<?php echo $score; ?> / <?php echo $total; ?>
</div>

<?php if($score >= 8){ ?>

<div class="message">
🎉 Congratulations! You have successfully completed all 3 rounds.
</div>

<a href="certificate.php" class="btn">
🏅 Download Certificate
</a>

<?php } else { ?>

<div class="message" style="color:red;">
Better Luck Next Time!
</div>

<?php } ?>

<a href="student.php" class="btn">
🏠 Back to Dashboard
</a>

<div class="footer">
Thank you for participating in the Online Quiz Competition.
</div>

</div>

</body>
</html>