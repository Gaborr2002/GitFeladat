<?php
$conn = new mysqli("localhost", "root", "", "pizzeria");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["mail"];
    $nev = "";
    $targy = $_POST["subject"];
    $tartalom = $_POST["conntent"];
    $ido = date("Y-m-d H:i:s");

    $sql = "SELECT nicknev FROM user WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nev = $row['nicknev'];
    }else{
        
        $nev = "Vendég";
    }

    $sql = "INSERT INTO email (kiirta, mikor, targy, tartalom) VALUES ('$nev', '$ido', '$targy', '$tartalom')"; 

    if(!($conn->query($sql) === TRUE)) {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    } else {
        header('Location: kontakt.php');
        /*echo "Sikeres regisztráció!";*/
    }
}

$conn->close();
?>