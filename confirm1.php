<?php
session_start();


$errors = [];
$success = '';

// Store form values in session if coming from previous form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['confirm'])) {
    $_SESSION['name'] = $_POST['name'] ?? '';
    $_SESSION['email'] = $_POST['email'] ?? '';
    $_SESSION['password'] = $_POST['password'] ?? '';
    $_SESSION['gender'] = $_POST['gender'] ?? '';
    $_SESSION['dob'] = $_POST['date'] ?? '';
    $_SESSION['division'] = $_POST['division'] ?? '';
    $_SESSION['color'] = $_POST['color'] ?? '';
    
}

// On confirm button press
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    // Fetch values from session
    $name = $_SESSION['name'] ?? '';
    $email = $_SESSION['email'] ?? '';
    $password = $_SESSION['password'] ?? '';
    $gender = $_SESSION['gender'] ?? '';
    $dob = $_SESSION['dob'] ?? '';
    $division = $_SESSION['division'] ?? '';
    $color = $_SESSION['color'] ?? '#000000';

    // Store color in cookie
    $ccolor = $_POST['color'] ?? '#000000';
    setcookie('username_color', $ccolor, time() + (86400 * 30), "/"); // Expires in 30 days

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        include("database.php");

        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email already registered.";
        } else {
            #$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO user (name, dob, password, email, division, gender,color) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert->bind_param("sssssss", $name, $dob, $password, $email, $division, $gender, $color);

            if ($insert->execute()) {
                header("location: index.php");
                session_unset(); // optional
                session_destroy(); // optional
            } else {
                $errors[] = "Failed to insert data.";
            }

            $insert->close();
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Confirm Details</title>
  <link rel="stylesheet" href="css/confirm.css">
</head>
<body>
  <div class="center-box">
    <div class="content">
      <p><strong>Preview Details</strong></p>
      <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['name'] ?? '') ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>
      <p><strong>Date of Birth:</strong> <?= htmlspecialchars($_SESSION['dob'] ?? '') ?></p>
      <p><strong>Password:</strong> <?= str_repeat('*', strlen($_SESSION['password'] ?? '')) ?></p>
      <p><strong>Gender:</strong> <?= htmlspecialchars($_SESSION['gender'] ?? '') ?></p>
      <p><strong>Division:</strong> <?= htmlspecialchars($_SESSION['division'] ?? '') ?></p>
      <p><strong>Color:</strong> <?= htmlspecialchars($_SESSION['color'] ?? '') ?></p>
    </div>

    <?php if (!empty($errors)): ?>
      <div style="color: red;">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div style="color: green;"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <div class="button-row">
      <form action="index.php" method="get" style="display:inline-block;">
        <button type="submit" class="btn1">Cancel</button>
      </form>
      <form method="post"  style="display:inline-block;">
        <button type="submit" name="confirm" class="btn2">Confirm</button>
      </form>
    </div>
  </div>
</body>
</html>
