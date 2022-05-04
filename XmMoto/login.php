<?php
include ('include/entete.inc.php');

?>
<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>XM MOTO</title>
  </head>
  <body>
    <section class="vh-100 bg-image">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 50px; border-width: medium;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Se connecter :</h2>
    
                  <form action="login_pdo.php" id="form" method="post" novalidate>
    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Votre email</label>
                      <input type="email" id="mail" name="mail" class="form-control form-control-lg" aria-describedby="emailHelp" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="3" placeholder="exemple@example.com" required>
                      <div class="invalid-feedback">
                        Il vous faut fournir un email valide.
                      </div>
                    </div>
    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="motdepasse">Mot de passe</label>
                      <input type="password" id="Mdp" name="motdepasse" class="form-control form-control-lg" minlength="4" placeholder="******" required>
                      <div class="invalid-feedback">
                        Il vous faut fournir un mot de passe valide.
                      </div>
                    </div>
    
                    <div class="d-flex justify-content-center">
                      <button type="identifier" name="identifier" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">Se connecter</button>
                    </div>
    
                    <p class="text-center text-muted mt-5 mb-0">Vous n'avez pas de compte ? <a href="inscription.php" class="fw-bold text-body"><u>Inscrivez-vous !</u></a></p>
    
                  </form>
    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      var mail=document.getElementById("email");
    mail.addEventListener("blur", function (evt) {
      console.log("Perte de focus pour le mail");
    });

    var motDePasse=document.getElementById("motdepasse");
    motDePasse.addEventListener("blur", function (evt) {
      console.log("Perte de focus pour le mdp");
    });

    (function() {
      "use strict"
      window.addEventListener("load", function() {
        var form = document.getElementById("form")
        form.addEventListener("submit", function(event) {
          if (form.checkValidity() == false) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add("was-validated")
        }, false)
      }, false)

    }())
    </script>
  </body>
  <footer>
    <?php
      include ('include/piedDePage.inc.php');
    ?>
  </footer>
</html>