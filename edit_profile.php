<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Handle profile update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    // Handle file upload
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["profile_pic"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $update_pic_sql = "UPDATE users SET profile_pic='$target_file' WHERE username='$username'";
                $conn->query($update_pic_sql);
            } else {
                $_SESSION['error'] = "Error uploading file.";
            }
        } else {
            $_SESSION['error'] = "Invalid file format. Only JPG, JPEG, PNG, and GIF allowed.";
        }
    }

    $update_sql = "UPDATE users SET 
        firstname='$firstname', 
        lastname='$lastname',  
        course='$course', 
        year='$year'
        WHERE username='$username'";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['success'] = "Profile updated successfully!";
        header("Location: edit_profile.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
        background: linear-gradient(135deg,rgb(163, 216, 247), #fad0c4,rgb(158, 221, 250));
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar .nav-link, .navbar-brand {
            color: white !important;
        }
        .container {
            background: linear-gradient(135deg, #fad0c4, rgb(163, 216, 247),rgb(211, 211, 201));;
            max-width: 600px;
            margin-top: 20px;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        .navbar {
    background-color: #0d6efd;
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000; /* Ensures it stays on top of other elements */
}
 </style>
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">CSS | My Dashboard / <b>Edit Profile</b></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><b>Home</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reservation</a></li>
                    <li class="nav-item"><a class="btn btn-warning" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center my-4">Edit Profile</h2>

        <!-- SUCCESS & ERROR MESSAGES -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form method="POST" action="edit_profile.php" enctype="multipart/form-data">
            <!-- Profile Picture -->
            <div class="text-center mb-3">
                <?php
                $profile_pic = !empty($user['profile_pic']) ? $user['profile_pic'] : 'uploads/default.png';
                ?>
                <img src="<?php echo $profile_pic; ?>" class="profile-pic">
                <br>
                <input type="file" name="profile_pic" class="form-control mt-2">
            </div>

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="<?php echo $user['course']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" value="<?php echo $user['year']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
        </form>
    </div>

</body>
</html>
