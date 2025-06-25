<?php
session_start();
$username = $_SESSION['uname'] ?? 'Guest';
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';

$message = '';
$selectedCities = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedCities = $_POST['cities'] ?? [];

    if (count($selectedCities) < 10) {
        $message = "Please select at least 10 cities.";
    } else {
        // Save selected cities to session and redirect to show.php
        $_SESSION['selectedCities'] = $selectedCities;
        header("Location: show.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>City Selection</title>
  <link rel="stylesheet" href="css/request.css">
</head>
<body background-color: <?= htmlspecialchars($bg_color) ?>>
  <div class ="container">

  <header>
    <div><h2><?= htmlspecialchars($username) ?></h2></div>
    <a href="logout.php"><button class = "button" >Logout</button></a>
  </header>

  <div class="container">
    <div><?= htmlspecialchars($message) ?></div>

  <h2>Select Your Cities</h2>
    <form method="POST" action = "show.php">
      <div class="city-list">
        <?php
          $cities = ["Tokyo", "Beijing", "Seoul", "Bangkok", "Mumbai", "Delhi", "Jakarta", "Manila",
           "Kuala Lumpur", "Hanoi", "Singapore", "Dhaka", "Karachi", "Tehram", "Baghdad", "Riyadh", 
           "Doha", "Istanbul", "Kolkata", "Shanhai"];
          foreach ($cities as $city) {
              echo "<label><input type='checkbox' name='cities[]' value='$city' /> $city</label>";
          }
        ?>
        
      </div>
      <button type="submit" class="submit-btn" name = "submit">Submit</button>
      
    </form>
  </div>
  </div>

</body>
</html>
