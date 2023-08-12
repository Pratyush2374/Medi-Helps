<?php
$host = "localhost";
$username = "root";
$password = "tiger";
$database = "medi_helps";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $query = "INSERT INTO sign_up (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Sign up successful!");</script>';
        header("Location: home1.html");
        exit();
    } else {
    
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
