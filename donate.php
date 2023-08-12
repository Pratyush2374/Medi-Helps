<?php
$host = "localhost";
$username = "root";
$password = "tiger";
$database = "medi_helps";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['medicine-name'])) {
    $medicineName = $_POST['medicine-name'];
    $expiryDate = $_POST['expiry-date'];
    $quantity = $_POST['quantity'];
    $donorName = $_POST['donor-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $query = "INSERT INTO donations (medicine_name, expiry_date, quantity, donor_name, email, phone, address, city, state, pincode)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, "ssisssssss", $medicineName, $expiryDate, $quantity, $donorName, $email, $phone, $address, $city, $state, $pincode);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>

