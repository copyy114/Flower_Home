<?php
include('..\data\conn.php');

$sql = "SELECT * FROM tbproduct WHERE is_recommended = TRUE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p><strike>$" . $row['prev_price'] . "</strike> $" . $row['current_price'] . "</p>";
        echo "<img src='..\uploaded_files/" . $row["img_path"] . "' alt='Product Image'>";
        echo "</div>";
    }
} else {
    echo "No recommended products available.";
}

$conn->close();
?>
