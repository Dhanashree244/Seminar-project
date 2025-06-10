<?php
// Sample data array
$locations = [
  ["name" => "Rio De Janeiro, Brazil", "price" => 500, "date" => "06/10/2025"],
  ["name" => "North Bondi, Australia", "price" => 750, "date" => "07/15/2025"],
  ["name" => "Berlin, Germany", "price" => 620, "date" => "08/20/2025"],
  ["name" => "Wat Arun, Thailand", "price" => 430, "date" => "09/12/2025"],
  ["name" => "Rome, Italy", "price" => 550, "date" => "10/05/2025"],
  ["name" => "Fuvahmulah, Maldives", "price" => 900, "date" => "11/22/2025"]
];

$destination = $_POST['destination'] ?? '';
$date = $_POST['date'] ?? '';
$price = $_POST['price'] ?? '';

$results = [];

foreach ($locations as $location) {
    if (
        stripos($location['name'], $destination) !== false &&
        strtotime($location['date']) >= strtotime($date) &&
        $location['price'] <= floatval($price)
    ) {
        $results[] = $location;
    }
}

if (count($results) > 0) {
    foreach ($results as $item) {
        echo "<div style='margin-bottom: 15px; padding: 10px; border: 1px solid #eee; border-radius: 8px;'>";
        echo "<h3 style='margin: 0; color: #00c9a7;'>{$item['name']}</h3>";
        echo "<p><strong>Date:</strong> {$item['date']}<br>";
        echo "<strong>Price:</strong> \${$item['price']}</p>";
        echo "</div>";
    }
} else {
    echo "<p>No matching destinations found.</p>";
}
?>
