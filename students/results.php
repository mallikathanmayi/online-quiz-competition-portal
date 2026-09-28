<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];
$student_id = $_SESSION['student_id'];
$quiz_id = 1;

$score = 0;
$total = 0;

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    $total=20;

    $qid = $row['question_id'];

    if (isset($_POST["q$qid"])) {

        if ($_POST["q$qid"] == $row['answer']) {
            $score++;
        }

    }
}

$insert = "INSERT INTO results(email, quiz_id, score, total_questions)
VALUES('$email','$quiz_id','$score','$total')";

if (!mysqli_query($conn, $insert)) {
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz Result</title>

<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f4f4;
}

.container{
    width:500px;
    margin:80px auto;
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.2);
    text-align:center;
}

h1{
    color:#28a745;
}

.email{
    font-size:18px;
    margin:15px 0;
}

.score{
    font-size:40px;
    color:#007BFF;
    font-weight:bold;
    margin:20px 0;
}

.btn{
    display:inline-block;
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

<div class="container">

<h1>🎉 Quiz Completed</h1>

<div class="email">
<b>Email:</b> <?php echo htmlspecialchars($email); ?>
</div>

<h2>Your Score</h2>

<div class="score">
<?php echo $score; ?> / <?php echo $total; ?>
</div>

<a href="student.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>