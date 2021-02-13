<? 

    
    if (isset($_GET["error"])) {
       $invalide = "Mot de passe ou courriel invalide";
   }
     
?>

<!DOCTYPE html>


<html lang="fr">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
<title>Banqueroute - Connection</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
  <!-- Hamburger menu petit ecran -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
  <!-- Liens externes -->
 


  <!-- Menu et entete -->
  <nav class="navbar navbar-expand-md navbar-light bg-dark">
    <div class="container-fluid">
      <a id="particuliers" class="navbar-brand" href="index.php">  <img src="https://i.ibb.co/vBWtY84/Logo-official.png" alt="Logo Banqueroute" height="50" ></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="first_menu" href="form_compte.php"><i class="fas fa-user"></i> S'inscrire</a>
          </li>
          <li class="nav-item">
            <a class="first_menu" href="index.php"><i class="fas fa-angle-double-left"></i> Retour</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>



    <!-- Image entete-->
    <br>
    <div id="containedr" class="container">
      <div class="row">
        <div class="col-12">
          <br>
          <img src="https://i.ibb.co/wztLbbX/maybe.png" alt="foule" id="img_des">
        </div>
      </div>

      <br>

      <div>Bienvenue chez la <h2 class="bleue">Banque</h2> <h2 class="vert"> &nbsp; &nbsp; Route</h2></div>

      <h6>Bienvenue, entrer votre courriel et votre mot de passe pour accéder à votre compte.</h6>
      <br>


      <!-- Formulaire php-->
    
    
    
    
    
   
	 
<form method="post" action="http://localhost/banque/eclient.php">
  <div class="form-group row">

      <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
      <div class="col-sm-10">
       <input type="email" class="form-control" id="courriel" name="courriel" placeholder="Votre courriel.." value="<?php echo isset($_POST['courriel']) ? $_POST['courriel'] : '' ?>">
       <?php if(isset($err_courriel)){
		   echo $err_courriel;
	   }?>
		   
      </div>

      <label for="pass1" class="col-sm-2 col-form-label">Mot de passe</label>
      <div class="col-sm-10">
       <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Votre mot de passe à 8 caractères" value="<?php echo isset($_POST['pass1']) ? $_POST['pass1'] : '' ?>">
        <?php if(isset($err_courriel)){
		   echo $err_pass1;
	   }?>
    
  <div class="erreur"> <? echo  $invalide; ?></div>
      </div>
   
      <br>
      <br>
      <h1></h1>
       &nbsp; &nbsp; <input type="submit" value="Se connecter" name="submit" class="btn btn-primary"> &nbsp; &nbsp; <a class="btn btn-primary" href="index.php"  role="button">Retour</a>
  
  <br>
  </div>
</form>


    
    <br>
  

  <!-- Footer -->
  <footer id="footer" class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

     
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div id="liste_footer2" class="footer-copyright text-center py-3">© 2019 Copyright: Lunettes3D Big corporation, Tous droits réservés

    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</html>
