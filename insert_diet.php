<?php
$servername = "localhost";
$username = "root";
$password = ""; // or your DB password
$database = "nutrition_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$food = $_POST['food'];
$quantity_input = floatval($_POST['quantity']);

$stmt = $conn->prepare("SELECT * FROM diet WHERE food = ?");
$stmt->bind_param("s", $food);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $db_quantity = floatval($row["quantity"]);
    $multiplier = $quantity_input / $db_quantity;

    $calories = round($row["calories"] * $multiplier, 2);
    $protein = round($row["protein"] * $multiplier, 2);
    $carbs   = round($row["carbs"] * $multiplier, 2);
    $fat     = round($row["fat"] * $multiplier, 2);

    echo "<h2>Nutrition Result for $quantity_input g of {$row['food']}</h2>";
    echo "<p>Calories: $calories kcal</p>";
    echo "<p>Protein: $protein g</p>";
    echo "<p>Carbohydrates: $carbs g</p>";
    echo "<p>Fat: $fat g</p>";
} else {
    echo "<p style='color:red;'>Food not found in database!</p>";
}

$conn->close();
?>
