<?php
$conn = new mysqli("localhost", "root", "", "pizzeria");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


/*KÉPEK FELTÖLTÉSE*/
if(isset($_POST["submit"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    //Üres eléresi út
    if($targetDir == "uploads/") {
        //echo "Az eléresi út nem lehet üres";
        header('Location: galleria.php');
        $uploadOk = 0;
    }

    // Ellenőrizzük, hogy valóban képfájl lett-e feltöltve
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "A feltöltött fájl nem egy kép.";
            $uploadOk = 0;
        }
    }

    // Engedélyezett fájlformátumok ellenőrzése, itt most csak a képformátumokat fogadjuk el
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Csak JPG, JPEG, PNG és GIF fájlokat lehet feltölteni.";
        $uploadOk = 0;
    }

    // Minden ellenőrzés után feltöltés, ha minden rendben van
    if($uploadOk == 0) {
        echo "Sajnáljuk, a feltöltés nem sikerült.";
    } else {
        $imgData = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

        $sql = "INSERT INTO pizza (kep) VALUES ('$imgData')";
        if(mysqli_query($conn, $sql)) {
            header('Location: galleria.php');
        }
    }
}



/*KÉPEK MEGJENELÍTÉSE*/
$sql = "SELECT kep FROM pizza";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="image-wrapper">';
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row["kep"]).'" />';
        echo '</div>';
    }
} else{
    echo "Nincsenek képek az adatbázisban.";
}

$conn->close();
?>