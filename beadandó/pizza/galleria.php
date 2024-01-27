<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="hu">
  <title>Pizza Forte</title>
  <link rel="stylesheet" href="galleria_styles.css">
  

</head>

<body>
  <?php include("feljel.html");?>

  <div class="feltolt-conntener" id="feltolt_conntener">
    <h1>Pizza Képfeltöltés</h1>
    Csak JPG, JPEG, PNG és GIF fájlokat lehet feltölteni!
    <form action="galleria_p.php" method="post" enctype="multipart/form-data">
       Válaszd ki a képet:
       <input type="file" name="fileToUpload" id="fileToUpload">
       <input type="submit" value="Feltöltés" name="submit">
    </form>
  </div>

  <div class="main-container" id="main-container">
    <!-- A képek itt fognak megjelenni -->
  </div>



  <script>
    const loginLink = document.getElementById('loginLink');
    const logoutButton = document.getElementById('logoutButton');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const belepes = document.getElementById('belepes');
    const registModal = document.getElementById('regist');
    const xModal = document.getElementById('x');
    const x2Modal = document.getElementById('x2');
    const welcomeMessage = document.getElementById('welcomeMessage');
    const feltolt_conntener = document.getElementById('feltolt_conntener');

    loginLink.addEventListener('click', function(event) {
      loginModal.style.display = 'block';
    });

    belepes.addEventListener('click', function(event) {
      event.preventDefault();
      loginLink.style.display = 'none';
      logoutButton.style.display = 'inline';
      loginModal.style.display = 'none';
      welcomeMessage.style.display = 'block';
    });

    logoutButton.addEventListener('click', function(event) {
      event.preventDefault();
      loginLink.style.display = 'inline';
      logoutButton.style.display = 'none';
      welcomeMessage.style.display = 'none';
      feltolt_conntener.style.display = 'none';
    });

    registModal.addEventListener('click', function(event) {
      event.preventDefault();
      registerModal.style.display = 'block';
      loginModal.style.display = 'none';
    });

    xModal.addEventListener('click', function(event) {
      event.preventDefault();
      registerModal.style.display = 'none';
      loginModal.style.display = 'none';
    });

    x2Modal.addEventListener('click', function(event) {
      event.preventDefault();
      registerModal.style.display = 'none';
      loginModal.style.display = 'none';
    });
 

    function mentes(event) {
      event.preventDefault();
  
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
  
      var formData = new FormData();
      formData.append('username', username);
      formData.append('password', password);

      fetch('belepes.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if(data.message === "Sikertelen belépés!"){
          welcomeMessage.style.display = 'none';
          loginLink.style.display = 'inline';
          logoutButton.style.display = 'none';
        }else{
          document.querySelector(".welcomeMessage").innerText = data.message;
          feltolt_conntener.style.display = 'block';
        }
      })
      .catch(error => {
        console.error('Hiba történt:', error);
      });
  }


  window.onload = function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("main-container").innerHTML = this.responseText;
      }
    };
    xhr.open("GET", "galleria_p.php", true);
    xhr.send();
  };
</script>

</body>
</html>