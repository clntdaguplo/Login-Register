<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnumber = trim($_POST['idnumber']);
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $course = trim($_POST['course']);
    $year = trim($_POST['year']);
    $username = trim($_POST['username']);
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
    <style>
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #000;
            border-radius: 5px;
            font-size: 16px;
            background: #fff;
            color: #000;
            text-align: center; /* Centers text inside dropdown */
            appearance: none;
            cursor: pointer;
        }
        option {
            text-align: center; /* Ensures options are also centered */
        }
    
        body {
        background: linear-gradient(135deg,rgb(163, 216, 247), #fad0c4,rgb(158, 221, 250));;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register Here 🔗</h2>
        <form method="post">

            <input type="text" name="idnumber" placeholder="ID Number" required><br>
            <input type="text" name="lastname" placeholder="Last Name" required><br>
            <input type="text" name="firstname" placeholder="First Name" required><br>
            <input type="text" name="middlename" placeholder="Middle Name"><br>
            
            
            <!-- Year Level dropdown centered -->
            <select name="course" required>
                <option value="" disabled selected>Course</option>
                <option value="BSIT">BSIT</option>
                <option value="BSCS">BSCS</option>
                
            </select><br>

            <select name="year" required>
                <option value="" disabled selected>Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select><br>

            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
