
<!DOCTYPE html>
<html>
<head>
  <title>City Selection</title>
  <link rel="stylesheet" href="css/request.css">
</head>
<body background-color: <?= htmlspecialchars($bg_color) ?>>

  <header>
    <div><?= htmlspecialchars($username) ?></div>
    <a href="logout.php"><button class = "button" >Logout</button></a>
  </header>

  <div class="container">
    <h2>Select Your Cities</h2>
    <form method="POST">
      <div class="city-list">
        <?php
          $cities = ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix",
                     "Philadelphia", "San Antonio", "San Diego", "Dallas", "San Jose",
                     "Austin", "Jacksonville", "Fort Worth", "Columbus", "Charlotte",
                     "San Francisco", "Indianapolis", "Seattle", "Denver", "Washington"];
          foreach ($cities as $city) {
              echo "<label><input type='checkbox' name='cities[]' value='$city' /> $city</label>";
          }
        ?>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>

</body>
</html>
