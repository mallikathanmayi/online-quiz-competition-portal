<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#eef2f7;
}

.header{
background:#0d6efd;
color:white;
padding:20px;
display:flex;
justify-content:space-between;
align-items:center;
}

.header h1{
font-size:30px;
}

.logout{
background:red;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:5px;
}

.logout:hover{
background:darkred;
}

.container{
width:90%;
margin:40px auto;
}

.welcome{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px lightgray;
margin-bottom:30px;
text-align:center;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

.card{
background:white;
padding:30px;
border-radius:10px;
text-align:center;
box-shadow:0 0 10px lightgray;
transition:.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card h2{
color:#0d6efd;
margin-bottom:15px;
}

.card p{
margin-bottom:20px;
}

.card a{
display:inline-block;
padding:10px 20px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
}

.card a:hover{
background:#084298;
}

.footer{
margin-top:40px;
text-align:center;
color:gray;
padding:15px;
}

</style>

</head>

<body>

<div class="header">

<h1>Admin Dashboard</h1>

<a href="admin_logout.php" class="logout">Logout</a>

</div>

<div class="container">

<div class="welcome">

<h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>

<p>Manage your Online Quiz Competition Portal</p>

</div>

<div class="cards">

<div class="card">
<h2>➕ Add Questions</h2>
<p>Add new quiz questions.</p>
<a href="add_question.php">Open</a>
</div>

<div class="card">
<h2>📋 View Questions</h2>
<p>View all quiz questions.</p>
<a href="view_questions.php">Open</a>
</div>

<div class="card">
<h2>✏️ Edit Questions</h2>
<p>Edit existing questions.</p>
<a href="edit_question.php">Open</a>
</div>

<div class="card">
<h2>🗑 Delete Questions</h2>
<p>Delete unwanted questions.</p>
<a href="delete_question.php">Open</a>
</div>

<div class="card">
<h2>👨‍🎓 Students</h2>
<p>View registered students.</p>
<a href="view_students.php">Open</a>
</div>

<div class="card">
<h2>📊 Results</h2>
<p>View students quiz results.</p>
<a href="view_results.php">Open</a>
</div>

</div>

</div>

<div class="footer">

<p>© 2026 Online Quiz Competition Portal | Admin Panel</p>

</div>

</body>
</html>