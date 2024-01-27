<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="hu">
  <title>Pizza Forte</title>
  <link rel="stylesheet" href="index_styles.css">
</head>

<body>
  <?php include("feljel.html");?>

  <div class="borito-container">
    <div class="mySlides fade">
      <p class="sz1">A hét ajánlata</p>
      <div class="liras1">MEDITERRÁN (fűszeres-paradicsomszósz, csirkemell, fetasajt, olivabogyó, mozzarella) 3295 Ft 32 cm</div>
      <img src="p2.png" style="width:95%">    
    </div>
        
    <div class="mySlides fade">
      <p class="sz1">Ezt is sokan kedvelik</p>
      <div class="liras1">SUPREME (paradicsomszósz, dupla szalámi, dupla mozzarella, parmezán) 3695 Ft 32 cm</div>
      <img src="p3.png" style="width:100%">
    </div>
  </div>


  <div class="szallit">
    <img src="szallitas.png" alt="Szállítás" width="1300px" height="465px" class="szallitas_kep"> 
  </div>


  <div class="pizza_teszt">
    <div class="cim">
      <p><h1>A PIZZA TÉSZTÁNK</h1></p>
    </div>
    <div class="tesztak-container">
      <div class="kisblokk" id="zöld">
        <div class="belsok"><img src="zold.png" height="250px" width="130px"></div>
          <div class="belsok"><h3>KLASSZIKUS</h3><br>
            Klasszikus Pizza Forte recept alapján készült közepesen vastag, kézzel nyújtott pizzatészta, serpenyőben sütve 32 és 45 cm-es méretben.<br><br>
            Próbáld ki baconnal vagy sajttal töltött széllel is!</div>
      </div>

      <div class="kisblokk" id="piros">
        <div class="belsok"><img src="piros.png" height="130px" width="130px"></div>
        <div class="belsok"><h3>IGAZI ITÁLIAI</h3><br>
          Igazi itáliai recept alapján készült, kézzel nyújtott, vékony és ropogós pizzatészta 32 cm-es méretben.</h3></div>
      </div>

      <div class="kisblokk" id="lila">
        <div class="belsok"><img src="lila.png" height="130px" width="130px"></div>
        <div class="belsok"><h3>FITNESZ</h3><br>
          A Fitness pizza tészta csökkentett szénhidrát és növelt rosttartalommal készül. 40%-kal kevesebb kalóriát tartalmaz. Light mozzarella sajttal. 32 cm-es méretben.</h3></div>
      </div>

    </div>
  </div>


  <div class="terkep">
    <div class="t-container" style="background-color: #242424;">
      <div class="t_iframe">
        <video width="640" height="360" controls style="margin-right: 2%; border-radius: 10px;">
          <source src="Pizza-Forte.mp4" type="video/mp4">
            A böngésződ nem támogatja a videót.
        </video>
        <iframe width="640" height="360" src="https://www.youtube.com/embed/xTaAMzMudHk?si=nEorcODgVnKfeY4T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border-radius: 10px;"></iframe>
      </div>
    </div>
  </div>


  <div class="terkep">
    <div class="t-container">
      <div class="t_cim"><h1>HOL TALÁLSZ MINKET?</h1></div>
      <div class="t_iframe">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d349960.30752050574!2d19.258812138358156!3d46.743902451948955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da798f5a5555%3A0xc81da2f400ee26cd!2sPizza%20Forte!5e0!3m2!1shu!2shu!4v1704202155868!5m2!1shu!2shu"
          width="600"
          height="450"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
        ></iframe></div>(További üzlethelységek az ország egész területén!)
    </div>
  </div>

  <div style="text-align: end; margin-right: 1%;">
    <a href="https://pizzaforte.hu/hu"><h3>pizzaforte.hu</h3></a>
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

    loginLink.addEventListener('click', function(event) {
      /*event.preventDefault();*/
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


    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      const slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if(slideIndex > slides.length) {slideIndex = 1}
      slides[slideIndex-1].style.display = "block";
      setTimeout(showSlides, 5500);
    }
  </script>

</body>
</html>