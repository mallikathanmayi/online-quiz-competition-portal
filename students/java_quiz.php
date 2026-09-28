<?php
session_start();
include "../db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT * FROM questions WHERE quiz_id=2 ORDER BY RAND() LIMIT 10";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HTML Quiz</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#f2f2f2;
}

.container{
    width:800px;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

.question{
    border:1px solid #ccc;
    padding:15px;
    margin-bottom:20px;
    border-radius:5px;
}

input[type=submit]{
    background:#007BFF;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

input[type=submit]:hover{
    background:#0056b3;
}
</style>

</head>

<body>

<div class="container">

<h2 align="center">HTML Quiz</h2>

<form action="results.php" method="post">

<input type="hidden" name="quiz_id" value="1">

<?php
$i=1;

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="question">

<h3>Q<?php echo $i; ?>. <?php echo $row['question']; ?></h3>

<label>
<input type="radio" name="q<?php echo $row['question_id']; ?>" value="<?php echo $row['option1']; ?>" required>
<?php echo $row['option1']; ?>
</label><br><br>

<label>
<input type="radio" name="q<?php echo $row['question_id']; ?>" value="<?php echo $row['option2']; ?>">
<?php echo $row['option2']; ?>
</label><br><br>

<label>
<input type="radio" name="q<?php echo $row['question_id']; ?>" value="<?php echo $row['option3']; ?>">
<?php echo $row['option3']; ?>
</label><br><br>

<label>
<input type="radio" name="q<?php echo $row['question_id']; ?>" value="<?php echo $row['option4']; ?>">
<?php echo $row['option4']; ?>
</label>

</div>

<?php
$i++;
}
?>

<center>
<input type="submit" value="Submit Quiz">
</center>

</form>

</div>

</body>
</html>