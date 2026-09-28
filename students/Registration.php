<?php

include "../db.php";

if(isset($_POST['register']))
{

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);

    // Password
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Email Check
    $check = mysqli_query(
        $conn,
        "SELECT * FROM students WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0)
    {
        echo "<script>
        alert('Email Already Registered');
        window.location='Registration.html';
        </script>";

        exit();
    }

    // Insert Student
    $sql = "INSERT INTO students
    (name,email,phone,college,branch,year,password)
    VALUES
    ('$name','$email','$phone','$college','$branch','$year','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Registration Successful');
        window.location='login.html';
        </script>";
    }
    else
    {
        echo "Database Error : " . mysqli_error($conn);
    }

}

?>