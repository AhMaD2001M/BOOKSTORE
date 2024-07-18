<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database (replace with your database connection code)
    $conn = mysqli_connect("localhost", "root", "ahmad123");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Registration failed: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Registration</h2>
    <form method="post" action="register.php">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
