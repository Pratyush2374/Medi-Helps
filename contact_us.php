<?php
$host = "localhost";
$username = "root";
$password = "tiger";
$database = "medi_helps";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_us(name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: message.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
