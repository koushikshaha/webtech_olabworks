<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit_login"])) {
    // Collect and sanitize inputs
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Please enter both email and password.";
        header("refresh: 2; url=index.php");
        exit();
    }

    // Prepare and execute query securely
    $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE email = ? AND password = ?");
    if (!$stmt) {
        echo "Database error.";
        exit();
    }

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        

        // Verify password
        if ($password === $row["password"]) {
          $_SESSION["uname"] = $row["name"];
          header("Location: request.php");
          exit();
}       else {
          echo "Incorrect password.";
          header("refresh: 2; url=index.php");
          exit();
}
    } else {
        echo "User not found.";
        header("refresh: 2; url=index.php");
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid request.";
    header("refresh: 2; url=index.php");
    exit();
}
?>
