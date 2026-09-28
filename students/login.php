<?php

session_start();

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = mysqli_real_escape_string(
        $conn,
        $_POST['password']
    );


    // Find student

    $sql = "SELECT * FROM students WHERE email='$email'";

    $result = mysqli_query($conn, $sql);


    // Database error

    if (!$result)
    {
        die(
            "Database Error: " .
            mysqli_error($conn)
        );
    }


    // Check email

    if (mysqli_num_rows($result) > 0)
    {

        $row = mysqli_fetch_assoc($result);


        // Check password

        if ($password == $row['password'])
        {

            // Create session

            $_SESSION['student_id'] =
                $row['student_id'];

            $_SESSION['email'] =
                $row['email'];

            $_SESSION['name'] =
                $row['name'];


            // IMPORTANT:
            // student.php is inside students folder

            header("Location: student.php");

            exit();

        }
        else
        {

            echo "
            <script>

            alert('Incorrect Password');

            window.location='login.html';

            </script>
            ";

        }

    }
    else
    {

        echo "
        <script>

        alert('Email Not Registered');

        window.location='Registration.html';

        </script>
        ";

    }

}
else
{

    header("Location: login.html");

    exit();

}

?>