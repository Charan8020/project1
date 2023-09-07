<?php
$firstName = $_POST['firstname']; // Corrected the field name
$lastName = $_POST['lastname']; // Corrected the field name
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$cpwd = $_POST['cpwd']; // Corrected the variable name

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    // Use proper field names in the query
    $stmt = $conn->prepare("INSERT INTO regestration (firstName, lastName, phone, email, pwd, cpwd) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $firstName, $lastName, $phone, $email, $password, $cpwd);

    $execval = $stmt->execute();
    if (!$execval) {
        echo "Error: " . $stmt->error;
    } 
    else {
        echo"<script>window.alert('you are successfully registered...')</script>";
        echo"<script>location.replace('index.html')</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
