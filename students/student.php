<?php

session_start();


// Check whether student is logged in

if (!isset($_SESSION['student_id']))
{

    header("Location: login.html");

    exit();

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Student Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;

    font-family:
    "Segoe UI",
    Arial,
    sans-serif;
}

body{

    min-height:100vh;

    background:
    linear-gradient(
        135deg,
        #eef5ff,
        #ffffff
    );

}


/* Header */

.header{

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #4facfe
    );

    color:white;

    padding:25px 50px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:
    0 4px 15px rgba(0,0,0,0.15);

}

.header h1{

    font-size:28px;

}

.header p{

    margin-top:5px;

    opacity:0.9;

}


/* Logout */

.logout{

    background:#dc3545;

    color:white;

    padding:10px 20px;

    border-radius:7px;

    text-decoration:none;

    font-weight:bold;

}

.logout:hover{

    background:#b02a37;

}


/* Container */

.container{

    width:90%;

    max-width:1100px;

    margin:40px auto;

}


/* Welcome */

.welcome{

    background:white;

    padding:30px;

    border-radius:15px;

    box-shadow:
    0 5px 20px rgba(0,0,0,0.10);

    margin-bottom:30px;

}

.welcome h2{

    color:#0d6efd;

    margin-bottom:10px;

}

.welcome p{

    color:#666;

}


/* Cards */

.cards{

    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(240px,1fr)
    );

    gap:25px;

}


/* Card */

.card{

    background:white;

    padding:30px;

    border-radius:15px;

    text-align:center;

    box-shadow:
    0 5px 20px rgba(0,0,0,0.10);

    transition:0.3s;

}

.card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 10px 25px rgba(0,0,0,0.15);

}

.card .icon{

    font-size:45px;

    margin-bottom:15px;

}

.card h3{

    color:#0d6efd;

    margin-bottom:10px;

}

.card p{

    color:#666;

    margin-bottom:20px;

}


/* Buttons */

.btn{

    display:inline-block;

    padding:11px 22px;

    background:#0d6efd;

    color:white;

    text-decoration:none;

    border-radius:7px;

    font-weight:bold;

}

.btn:hover{

    background:#084298;

}


/* Footer */

footer{

    text-align:center;

    margin-top:50px;

    padding:20px;

    color:#777;

}


/* Mobile */

@media(max-width:600px){

    .header{

        padding:20px;

        flex-direction:column;

        gap:15px;

        text-align:center;

    }

    .container{

        width:92%;

    }

}

</style>

</head>


<body>


<!-- HEADER -->

<div class="header">

    <div>

        <h1>
            🎓 Student Dashboard
        </h1>

        <p>
            Welcome to Online Quiz Portal
        </p>

    </div>


    <a
        href="logout.php"
        class="logout"
    >
        Logout
    </a>

</div>


<!-- MAIN -->

<div class="container">


    <!-- Welcome -->

    <div class="welcome">

        <h2>
            Welcome,
            <?php
            echo htmlspecialchars(
                $_SESSION['name']
            );
            ?> 👋
        </h2>

        <p>

            Email:
            <?php
            echo htmlspecialchars(
                $_SESSION['email']
            );
            ?>

        </p>

    </div>


    <!-- Cards -->

    <div class="cards">


        <!-- Quiz -->

        <div class="card">

            <div class="icon">
                📝
            </div>

            <h3>
                Available Quizzes
            </h3>

            <p>
                Participate in online
                programming quizzes.
            </p>

            <a
                href="round1.php"
                class="btn"
            >
                Start Quiz
            </a>

        </div>


        <!-- Profile -->

        <div class="card">

            <div class="icon">
                👤
            </div>

            <h3>
                My Profile
            </h3>

            <p>
                View your student profile
                and details.
            </p>

            <a
                href="profile.php"
                class="btn"
            >
                View Profile
            </a>

        </div>


        <!-- Results -->

        <div class="card">

            <div class="icon">
                🏆
            </div>

            <h3>
                Previous Results
            </h3>

            <p>
                View your previous quiz
                attempts and scores.
            </p>

            <a
                href="previous_attempts.php"
                class="btn"
            >
                View Results
            </a>

        </div>


        <!-- Instructions -->

        <div class="card">

            <div class="icon">
                📚
            </div>

            <h3>
                Instructions
            </h3>

            <p>
                Read quiz rules and
                instructions.
            </p>

            <a
                href="instructions.php"
                class="btn"
            >
                Read Instructions
            </a>

        </div>


    </div>


</div>


<footer>

    © 2026 Online Quiz Portal
    | All Rights Reserved

</footer>


</body>

</html>