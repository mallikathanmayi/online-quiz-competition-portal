<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT * FROM questions WHERE round=1 ORDER BY RAND() LIMIT 20";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Round 1</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
    margin:0;
}

.header{
    background:#007BFF;
    color:white;
    text-align:center;
    padding:20px;
}

.timer{
    position:fixed;
    top:15px;
    right:20px;
    background:red;
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

input[type=submit]{
    background:#28a745;
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:5px;
    cursor:pointer;
    font-size:18px;
}

</style>

</head>

<body>

<div class="header">
<h2>Round 1 Quiz</h2>
</div>

<div class="timer">
⏰ <span id="timer">10:00</span>
</div>

<div class="container">

<form id="quizForm" action="result_round1.php" method="post">

<?php
$i=1;

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="question">

<h3>Q<?php echo $i; ?>.
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
<input type="submit" value="Submit Round 1">
</center>

</form>

</div>

<script>

let time=600;

let timer=setInterval(function(){

let m=Math.floor(time/60);
let s=time%60;

if(s<10) s="0"+s;

document.getElementById("timer").innerHTML=m+":"+s;

if(time<=0){
clearInterval(timer);
document.getElementById("quizForm").submit();
}

time--;

},1000);

</script>

</body>
</html>