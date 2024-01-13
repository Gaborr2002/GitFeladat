<?php
$conn = new mysqli("localhost", "root", "", "pizzeria");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE nicknev='$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row["jelszo"])){
            $sql = "SELECT `vezeteknev`, `keresztnev`, `nicknev` FROM user WHERE nicknev='$username'";
            $result = $conn->query($sql);
            $kiir = "Bejelentkezett: " . $row['vezeteknev'] . " " . $row['keresztnev'] . " (" . $row['nicknev'] . ")";
            echo json_encode(["message" => $kiir]);
        }
        else{
            $kiir = "Sikertelen belépés!";
            echo json_encode(["message" => $kiir]);
        }
    }else {
        // Sikertelen bejelentkezés
        //echo "Hibás felhasználónév vagy jelszó!";
        $kiir = "Sikertelen belépés!";
        echo json_encode(["message" => $kiir]);
    }
}

$conn->close();
?>