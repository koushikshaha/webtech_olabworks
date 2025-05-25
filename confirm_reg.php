<?php
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$dob = $_POST['date'];
$division = $_POST['division'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Box with Bottom Buttons</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
    }

    .center-box {
      background-color: white;
      width: 500px;
      padding: 30px 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: auto;
    }

    .content {
      flex-grow: 1;
      text-align: center;
      padding: 10px;
    }

    .button-row {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .center-box button {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn1 {
      background-color: #3498db;
      color: white;
    }

    .btn1:hover {
      background-color: #2980b9;
    }

    .btn2 {
      background-color: #2ecc71;
      color: white;
    }

    .btn2:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>
  <div class="center-box">
    <div class="content">
      <p><strong>Preview Details</strong></p>
      <p><strong>Name:</strong> <?= htmlspecialchars($name ?? '') ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email ?? '') ?></p>
      <p><strong>Date of Birth:</strong> <?= htmlspecialchars($dob ?? '') ?></p>
      <p><strong>Password:</strong> <?= htmlspecialchars($password?? '') ?></p>
      <p><strong>Gender:</strong> <?= htmlspecialchars($gender ?? '') ?></p>
      <p><strong>Division:</strong> <?= htmlspecialchars($division ?? '') ?></p>
    </div>

    <div class="button-row">
      <form action="index.php" method="get">
        <button type="submit" class="btn1">Cancel</button>
      </form>
      <form action="submit_to_db.php" method="post">
        <button type="submit" class="btn2">Confirm</button>
      </form>
    </div>
  </div>
</body>
</html>
