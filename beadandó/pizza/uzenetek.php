<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="hu">
  <title>Pizza Forte - Üzenetek</title>
  <link rel="stylesheet" href="uzenetek_styles.css">
</head>

<body>
  <?php include("feljel.html");?>

  <table id="pizzeria_table">
    <tr>
      <th colspan="4" class="cim_th"><div class="cim_d"><h1>Üzenetek:</h1></div></th>
    </tr>
    <tr>
      <th style="width: 10%;">Kiírta</th>
      <th style="width: 10%;">Tárgy</th>
      <th style="width: 50%;">Tartalom</th>
      <th style="width: 8%;">Mikor</th>
    </tr>
  </table>



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
        }
      })
      .catch(error => {
        console.error('Hiba történt:', error);
      });
    }

    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("pizzeria_table").innerHTML += this.responseText;
      }
    };
    xhttp.open("GET", "uzenetek_p.php", true);
    xhttp.send();
  </script>

</body>
</html>

