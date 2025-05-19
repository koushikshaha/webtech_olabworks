<!-- request.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Select Cities</title>
</head>
<body>
    <h2>Select 10 Cities</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['cities']) || count($_POST['cities']) !== 10) {
            echo "<p style='color:red;'>Please select exactly 10 cities.</p>";
        } else {
            // Redirect to showaqi.php with selected cities via session
            session_start();
            $_SESSION['selected_cities'] = $_POST['cities'];
            header("Location: showaqi.php");
            exit();
        }
    }

    $cities = [
    "Tokyo", "Beijing", "Seoul", "Bangkok", "Mumbai",
    "Delhi", "Jakarta", "Manila", "Kuala Lumpur", "Hanoi",
    "Singapore", "Dhaka", "Karachi", "Tehran", "Baghdad",
    "Riyadh", "Doha", "Istanbul", "Kolkata", "Shanghai"
];

    ?>

    <form method="post">
        <?php foreach ($cities as $city): ?>
            <label>
                <input type="checkbox" name="cities[]" value="<?= htmlspecialchars($city) ?>">
                <?= htmlspecialchars($city) ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
