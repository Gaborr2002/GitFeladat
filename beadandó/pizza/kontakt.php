<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="hu">
  <title>Pizza Forte - Kontakt</title>
  <link rel="stylesheet" href="kontakt_styles.css">
</head>

<body>
  <?php include("feljel.html");?>
    
    
  <table class="table-contener">
    <tr>
      <td class="cim"><h1>Küldj nekünk üzenetet!</h1></td>
    </tr>

    <tr>
      <td>
        <div class="mail-container">
          <form action="kontakt_p.php" method="post">
            <table>
              <tr>
                <td><input type="text" id="mail" name="mail" placeholder="Az Ön email címe" class="i-es"></td>
              </tr>
              <tr>
                <td><input type="text" id="subject" name="subject" placeholder="Tárgy" class="i-es"></td>
              </tr>
              <tr>
                <td>
                  <textarea id="conntent" name="conntent" placeholder="Üzenet"></textarea>
                  <input type="submit" value="Küldés" id="kuldes" name="kuldes">
                </td>
              </tr>
          </table>
          </form>
        </div>
       </td>
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
    











    function requestData() {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            var phpfirsname2 = data.firsname2;
            var phpVlastname2 = data.lastname2;
            var phpninkname = data.ninkname;
                    
            var userDiv = document.querySelector('.user');
            userDiv.innerHTML = `
              <p>${phpfirsname2}</p>
              <p>${phpVlastname2}</p>
              <p>${phpninkname}</p>
            `;
          }else {
            console.error('Hiba történt a kérés során');
          }
        }
      };
    
        xhr.open('GET', 'adatok.php', true);
        xhr.send();
    }
  </script>

</body>
</html>