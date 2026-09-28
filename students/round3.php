<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT * FROM questions WHERE round=3 ORDER BY RAND() LIMIT 10";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Round 3 - Final Round</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:#f4f4f4;
    margin:0;
}

.header{
    background:#6f42c1;
    color:white;
    text-align:center;
    padding:20px;
}

.timer{
    position:fixed;
    top:15px;
    right:20px;
    background:#dc3545;
    color:white;
    padding:10px 20px;
    border-radius:8px;
    font-size:20px;
    font-weight:bold;
}

.container{
    width:900px;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

.question{
    border:1px solid #ddd;
    padding:15px;
    margin-bottom:20px;
    border-radius:8px;
}

.question h3{
    color:#333;
}

input[type=submit]{
    background:#198754;
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:5px;
    cursor:pointer;
    font-size:18px;
}

input[type=submit]:hover{
    background:#146c43;
}

</style>

</head>

<body>

<div class="header">
<h2>🏆 Online Quiz Competition Portal</h2>
<h3>Round 3 - Final Round</h3>
</div>

<div class="timer">
⏰ <span id="timer">05:00</span>
</div>

<div class="container">

<form id="quizForm" action="result_round3.php" method="post">

<?php

$i=1;

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="question">

<h3>
Q<?php echo $i; ?>.
<?php echo htmlspecialchars($row['question']); ?>
</h3>

<label>
<input type="radio"
name="q<?php echo $row['question_id']; ?>"
value="<?php echo htmlspecialchars($row['option1']); ?>" required>
<?php echo htmlspecialchars($row['option1']); ?>
</label>

<br><br>

<label>
<input type="radio"
name="q<?php echo $row['question_id']; ?>"
value="<?php echo htmlspecialchars($row['option2']); ?>">
<?php echo htmlspecialchars($row['option2']); ?>
</label>

<br><br>

<label>
<input type="radio"
name="q<?php echo $row['question_id']; ?>"
value="<?php echo htmlspecialchars($row['option3']); ?>">
<?php echo htmlspecialchars($row['option3']); ?>
</label>

<br><br>

<label>
<input type="radio"
name="q<?php echo $row['question_id']; ?>"
value="<?php echo htmlspecialchars($row['option4']); ?>">
<?php echo htmlspecialchars($row['option4']); ?>
</label>

</div>

<?php
$i++;
}
?>

<center>
<input type="submit" value="Submit Final Round">
</center>

</form>

</div>

<script>

let time = 5 * 60;

let timer = setInterval(function(){

let minutes = Math.floor(time/60);
let seconds = time % 60;

if(seconds < 10){
    seconds = "0" + seconds;
}

document.getElementById("timer").innerHTML = minutes + ":" + seconds;

if(time <= 0){
    clearInterval(timer);
    alert("Time Over! Final Round Submitted.");
    document.getElementById("quizForm").submit();
}

time--;

},1000);

</script>

</body>
</html>