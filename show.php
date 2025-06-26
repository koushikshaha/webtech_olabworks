<?php
session_start();
$username = $_SESSION['uname'] ?? 'Guest';
$color = $_SESSION["color"] ;
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedCities = $_POST['cities'] ?? [];

    if (count($selectedCities) < 10) {
        echo "<p style='color:red;'>Please select at least 10 cities.</p>";
        echo "<a href='request.php'>Go Back</a>";
        exit;
    }

    // DB connection
  include "database.php";

    // Escaping and building query
    $placeholders = implode(',', array_fill(0, count($selectedCities), '?'));
    $stmt = $conn->prepare("SELECT city, country, aqi FROM aqi WHERE city IN ($placeholders)");
    $stmt->bind_param(str_repeat('s', count($selectedCities)), ...$selectedCities);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/showaqi.css">
  <title>Selected City Data</title> 

  <style>
    .container {
      background-color: <?= htmlspecialchars($color) ?>;
    }
    header{
      background-color:#e088ff
    }
  </style>
</head>

<body>
  <div class ="container">
  <header>
    <div><h2><?= htmlspecialchars($username) ?></h2></div>
    <a href="logout.php"><button class = "button">Logout</button></a>
  </header>
  <div class ="container1">


  <h2>Selected Cities Information</h2>
  <table>
    <tr>
      <th>City</th>
      <th>Country</th>
      <th>AQI</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['city']) ?></td>
      <td><?= htmlspecialchars($row['country']) ?></td>
      <td><?= htmlspecialchars($row['aqi']) ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <footer>
    <div >
      <a href="request.php"><button class ="button">Go back to previous page</button></div></footer>
    </div>
  </footer>
  </div>
  </div>
</body>
</html>
