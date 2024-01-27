<?php
    $conn = new mysqli("localhost", "root", "", "pizzeria");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $jelszo_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (vezeteknev, keresztnev, nicknev, email, jelszo) VALUES ('$firstname', '$lastname', '$nickname', '$email', '$jelszo_hash')"; 

    if(!($conn->query($sql) === TRUE)) {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    }else {
        header('Location: index.php');
        /*echo "Sikeres regisztráció!";*/
    }
}

$conn->close();
?>