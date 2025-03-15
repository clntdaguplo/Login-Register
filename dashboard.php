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
$profile_pic = !empty($user['profile_pic']) ? $user['profile_pic'] : 'uploads/default.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
        background: linear-gradient(135deg,rgb(243, 243, 232),rgb(121, 199, 235),rgb(250, 249, 247));
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar .nav-link, .navbar-brand {
            color: white !important;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
        }
        .dashboard-box {
            background: linear-gradient(135deg,rgb(163, 216, 247), #fad0c4,rgb(158, 221, 250));;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 119, 255, 0.1);
            margin-bottom: 50px;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        .logout {
            background:rgba(238, 255, 0, 0.5) !important;
            color: white;
        }
    </style>
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>CCS | My Dashboard</b></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><b>Home</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="edit_profile.php"><b>Edit Profile</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reservation</a></li>
                    <li class="nav-item"><a class="btn btn-warning logout" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center my-4">Welcome, <?php echo $user['firstname']; ?>! 🎉</h2>

        <div class="row">
            <!-- Student Information -->
            <div class="col-md-4">
                <div class="dashboard-box ">
                    <h5>Student Information</h5>
                    <img src="<?php echo $profile_pic; ?>" class="profile-pic mb-3">
                    <p><strong>Name:</strong> <?php echo $user['firstname'] . " " . $user['lastname']; ?></p>
                    <p><strong>Course:</strong> <?php echo $user['course']; ?></p>
                    <p><strong>Year:</strong> <?php echo $user['year']; ?></p>
                    <p><strong>Session:</strong> 69</p>
                    <a href="edit_profile.php" class="btn btn-primary btn-sm ">Edit Profile</a>
                </div>
            </div>

            <!-- Announcements -->
            <div class="col-md-4">
                <div class="dashboard-box">
                    <h5>📢 Announcement</h5>
                    <p><strong>CCS Admin | 2030-Feb-03</strong></p>
                    <p>The College of Computer Studies will open the registration of students for the Sit-in privilege starting tomorrow. Thank you! - Lab Supervisor</p>
                    <hr>
                    <p><strong>CCS Admin | 2030-May-08</strong></p>
                    <p>Important Announcement! We are excited to announce the launch of our new website! 🎉 Explore our latest products and services now!</p>
                </div>
            </div>

            <!-- Rules & Regulations -->
            <div class="col-md-4">
                <div class="dashboard-box">
                    <h5>📜 Rules and Regulations</h5>
                    <strong>University of Cebu</strong>
                    <p><strong>LABORATORY RULES AND REGULATIONS</strong></p>
                    <ul>
                        <li>Maintain silence, proper decorum, and discipline inside the laboratory.</li>
                        <li>Mobile phones, Walkmans, and other personal devices must be switched off.</li>
                        <li>Games are not allowed inside the lab.</li>
                        <li>Surfing the Internet is allowed only with the permission of the instructor.</li>
                        <li>Downloading and installing software is strictly prohibited.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
