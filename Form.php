<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve data from POST request
    $name = $_POST['name'] ?? null;
    $password = $_POST['password'] ?? null;
    $email = $_POST['email'] ?? null;
    $number = $_POST['number'] ?? null;
    $gender = $_POST['gender'] ?? null; // Check if gender is set

    // Debugging output to check form values
    echo "Name: $name<br>";
    echo "Password: $password<br>";
    echo "Email: $email<br>";
    echo "Number: $number<br>";
    echo "Gender: $gender<br>"; // Output the gender value

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $dbPassword = ""; // Changed variable name to avoid conflict with user password
    $db = "web tech";

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbPassword, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO form (name, password, email, number, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $hashedPassword, $email, $number, $gender);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
