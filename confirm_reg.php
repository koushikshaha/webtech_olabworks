<?php
session_start();
include("database.php");

// Use null coalescing operator to avoid undefined index notices
$name = $_POST['name'];
$email = $_POST['email'] ;
$password = $_POST['password'] ;
$gender = $_POST['gender'] ;
$dob = $_POST['date'] ;
$division = $_POST['division'] ;
$color = $_POST['color'] ; // optional, assuming you're using it for user preferences

$errors = [];
$success = '';

if (isset($_POST['confirm'])) {

    // ✅ Validate input
    if (!$name || !$email || !$password || !$gender || !$dob || !$division) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    echo "ok";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // ✅ Prepare and execute insert
        $insert = $conn->prepare("INSERT INTO user (name, dob, password, email, division, gender) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("ssssss", $name, $dob, $hashedPassword, $email, $division, $gender);

        if ($insert->execute()) {
            $success = "✅ User registered successfully!";
      echo $success;
        } else {
      $errors[] = "❌ Database insert failed: ";
      echo "failed"; 
            
        }

        $insert->close();
    }

    // Optional: save $color in a cookie
    if ($color) {
        setcookie("bg_color", $color, time() + (86400 * 30), "/");
    echo "cookie set";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Box with Bottom Buttons</title>
  <link rel="stylesheet" href="css/confirm.css">
</head>
<body>
  <div class="center-box">
    <div class="content">
      <p><strong>Preview Details</strong></p>
      <p><strong>Name:</strong> <?= htmlspecialchars($name ) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email ) ?></p>
      <p><strong>Date of Birth:</strong> <?= htmlspecialchars($dob ) ?></p>
      <p><strong>Password:</strong> <?= htmlspecialchars($password) ?></p>
      <p><strong>Gender:</strong> <?= htmlspecialchars($gender ) ?></p>
      <p><strong>Division:</strong> <?= htmlspecialchars($division ) ?></p>
    </div>

    <div class="button-row">
      <form action="index.php" method="get">
        <button type="submit" class="btn1">Cancel</button>
      </form>
      <form  method="post"  >
        <button type="submit" name ="confirm" class="btn2">Confirm</button>
      </form>
    </div>
  </div>
</body>
</html>
