<?php
$conn = new mysqli("localhost", "root", "", "pizzeria");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT kiirta, targy, mikor, tartalom FROM email ORDER BY mikor DESC";
$result = $conn->query($sql);

// Megjelenítés a táblázatban
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["kiirta"]."</td><td>".$row["targy"]."</td><td>".$row["tartalom"]."</td><td>".$row["mikor"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nincs eredmény.</td></tr>";
}

$conn->close();
?>
