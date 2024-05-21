<?php
include("config.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    $sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_user == 0 && $count_email == 0) {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO signup(username, email, password) VALUES('$username', '$email', '$hash')";
            $insert_result = mysqli_query($conn, $insert_query);
            if ($insert_result) {
                echo "<script>
                    alert('Registration successful');
                    window.location.href = 'homepages.html';
                </script>";
            } else {
                echo "<script>
                    alert('Error in registration');
                </script>";
            }
        } else {
            echo "<script>
                    alert('Password mismatch');
                </script>";
        }
    } else {
        if ($count_user > 0) {
            echo "<script>
                alert('Username already exists');
                window.location.href = 'login.php';
                </script>";
        }
        if ($count_email > 0) {
            echo "<script>
                alert('Email already exists');
                window.location.href = 'login.php';
                </script>";
        }
    }
}
