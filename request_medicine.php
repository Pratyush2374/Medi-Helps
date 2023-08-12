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
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $medicineName = mysqli_real_escape_string($connection, $_POST['medicine-name']);
    $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
    $reason = mysqli_real_escape_string($connection, $_POST['reason']);

    $query = "INSERT INTO medicine_requests (name, email, phone, address, medicine_name, quantity, reason)
              VALUES ('$name', '$email', '$phone', '$address', '$medicineName', '$quantity', '$reason')";

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Request submitted successfully!");</script>';
        header("Location: message.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
