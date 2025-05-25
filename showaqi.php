<!DOCTYPE html>
<html>
<head>
  <title>Air Quality Report</title>
  <link rel="stylesheet" href="css/showaqi.css">
</head>
<body background-color: <?= htmlspecialchars($_COOKIE['bg_color'] ?? '#ffffff') ?>>

  <header>
    <div><?= htmlspecialchars($username) ?></div>
    <a href="logout.php"><button class = "button">Logout</button></a>
  </header>

  <div class="container">
    <h2>Air Quality Index (AQI)</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Country</th>
          <th>City</th>
          <th>AQI</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>USA</td><td>New York</td><td>75</td></tr>
        <tr><td>2</td><td>India</td><td>Delhi</td><td>180</td></tr>
        <tr><td>3</td><td>China</td><td>Beijing</td><td>160</td></tr>
        <tr><td>4</td><td>Germany</td><td>Berlin</td><td>55</td></tr>
      </tbody>
    </table>
  </div>

</body>
</html>
