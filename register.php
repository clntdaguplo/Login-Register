<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnumber = trim($_POST['idnumber']);
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $course = trim($_POST['course']);
    $year = trim($_POST['year']);
    $email = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (idnumber, lastname, firstname, middlename, course, year, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $idnumber, $lastname, $firstname, $middlename, $course, $year, $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Account Created Successfully!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register Here 🔗</h2>
        <form method="post">
            <input type="text" name="idnumber" placeholder="ID Number" required><br>
            <input type="text" name="lastname" placeholder="Last Name" required><br>
            <input type="text" name="firstname" placeholder="First Name" required><br>
            <input type="text" name="middlename" placeholder="Middle Name"><br>
            <input type="text" name="course" placeholder="Course" required><br>
            <input type="text" name="year" placeholder="Year Level" required><br>
            <input type="username" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
