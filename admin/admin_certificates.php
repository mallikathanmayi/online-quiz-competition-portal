<?php
session_start();
include "../db.php";

/* Uncomment if Admin Login is available

if(!isset($_SESSION['admin']))
{
    header("Location:admin_login.html");
    exit();
}

*/

$sql="SELECT * FROM results
      WHERE quiz_id=3
      ORDER BY score DESC";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Student Certificates</title>

<style>

body{
margin:0;
font-family:Arial,sans-serif;
background:#f4f6f9;
}

.header{
background:#0d6efd;
color:white;
text-align:center;
padding:20px;
}

.container{
width:90%;
margin:30px auto;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);
}

table{
width:100%;
border-collapse:collapse;
}

table,th,td{
border:1px solid #ddd;
}

th{
background:#0d6efd;
color:white;
padding:12px;
}

td{
padding:10px;
text-align:center;
}

tr:nth-child(even){
background:#f9f9f9;
}

.winner{
color:green;
font-weight:bold;
}

.participant{
color:orange;
font-weight:bold;
}

.btn{
padding:8px 18px;
background:#198754;
color:white;
text-decoration:none;
border-radius:5px;
}

.btn:hover{
background:#146c43;
}

.back{
display:inline-block;
margin-top:20px;
padding:10px 25px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<div class="header">
<h2>Student Certificates</h2>
</div>

<div class="container">

<table>

<tr>
<th>S.No</th>
<th>Email</th>
<th>Score</th>
<th>Certificate</th>
<th>Action</th>
</tr>

<?php

$i=1;

while($row=mysqli_fetch_assoc($result))
{

$email=$row['email'];
$score=$row['score'];
$total=$row['total_questions'];

if($score>=6)
{
$type="Winner Certificate";
$class="winner";
}
else
{
$type="Participation Certificate";
$class="participant";
}

?>

<tr>

<td><?php echo $i++; ?></td>

<td><?php echo htmlspecialchars($email); ?></td>

<td><?php echo $score." / ".$total; ?></td>

<td class="<?php echo $class; ?>">
<?php echo $type; ?>
</td>

<td>

<a class="btn"
href="view_certificates.php?email=<?php echo urlencode($email); ?>">
View
</a>

</td>

</tr>

<?php
}
?>

</table>

<br>

<center>

<a href="admin_dashboard.php" class="back">
Back to Dashboard
</a>

</center>

</div>

</body>
</html>