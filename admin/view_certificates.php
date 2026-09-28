<?php
session_start();
include "../db.php";

if(!isset($_GET['email']))
{
    die("Invalid Request");
}

$email = mysqli_real_escape_string($conn, $_GET['email']);

$sql = "SELECT * FROM results
        WHERE email='$email'
        ORDER BY quiz_id DESC
        LIMIT 1";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0)
{
    die("Certificate Not Found");
}

$row = mysqli_fetch_assoc($result);

$score = $row['score'];
$total = $row['total_questions'];

if($score >= 6)
{
    $certificate = "Winner Certificate";
    $title = "Certificate of Achievement";
    $color = "#FFD700";
    $message = "For Successfully Winning the Online Quiz Competition";
}
else
{
    $certificate = "Participation Certificate";
    $title = "Certificate of Participation";
    $color = "#0d6efd";
    $message = "For Participating in the Online Quiz Competition";
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title><?php echo $certificate; ?></title>

<style>

body{
margin:0;
background:#f2f2f2;
font-family:Georgia,serif;
}

.certificate{
width:900px;
margin:30px auto;
background:white;
padding:50px;
text-align:center;
border:12px solid <?php echo $color; ?>;
box-shadow:0 0 20px rgba(0,0,0,.3);
}

h1{
color:<?php echo $color; ?>;
font-size:45px;
margin-bottom:20px;
}

h2{
font-size:30px;
color:#333;
margin:20px 0;
}

p{
font-size:22px;
line-height:35px;
}

.score{
font-size:28px;
color:green;
font-weight:bold;
margin-top:20px;
}

.footer{
display:flex;
justify-content:space-between;
margin-top:60px;
}

.sign{
width:200px;
text-align:center;
}

.btn{
display:inline-block;
padding:12px 25px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
margin:20px 10px;
}

.btn:hover{
background:#084298;
}

.print{
background:#198754;
}

.print:hover{
background:#146c43;
}

</style>

</head>

<body>

<div class="certificate">

<h1><?php echo $title; ?></h1>

<p>This Certificate is Proudly Presented To</p>

<h2><?php echo htmlspecialchars($email); ?></h2>

<p><?php echo $message; ?></p>

<div class="score">
Score : <?php echo $score; ?> / <?php echo $total; ?>
</div>

<p>Date : <?php echo date("d-m-Y"); ?></p>

<div class="footer">

<div class="sign">
_____________________<br>
Quiz Coordinator
</div>

<div class="sign">
_____________________<br>
Principal
</div>

</div>

<br>

<a href="#" class="btn print" onclick="window.print()">
Print Certificate
</a>

<a href="admin_certificates.php" class="btn">
Back
</a>

</div>

</body>
</html>