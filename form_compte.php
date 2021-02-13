<?php
date_default_timezone_set('America/New_York');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 


     
           
    
    
  
 
    //Test pour enlever les caractères spéciaux
    function test_input($data)
    {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
	//Fonction qui sauvegarde les membres dans la base de donnéess
    function sauvegarde_membre()
    {
        $today_date = date("Y+-m-d h:i:s");
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $courriel = $_POST['courriel'];
        $pass1 = sha1($_POST['pass1']);
        $pass2 = $_POST['pass2'];
        $type_membre = "particulier";

    $servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
              
          $conn  = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
  
     
         $d = date("Y-m-d h:i:s", mktime(1, 1, 1, 1, 01, 2000));
        $stmt = $conn->prepare("INSERT INTO membres ( type_membre, nom, prenom, adresse, no_telephone, courriel, mot_de_passe, date_ouverture, date_fermeture) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss",  $type_membre, $nom, $prenom, $adresse, $tel, $courriel, $pass1, $today_date, $d );
        $stmt->execute();
        $stmt->store_result();
       
      
        $stmt->close();
        $conn->close();
        

    }
    
    
   $err_courriel=$err_courriel1=$err_pass1=$err_pass2=$err_nom=$err_prenom=$err_adresse=$err_tel=$err_nom2=$err_prenom2=$err_tel2="";
    
    if(isset($_POST["submit"]))

    {

  $servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
              
          $conn  = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
      

        
    $today_date = date("Y-m-d h:i:s");
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $courriel = $_POST['courriel'];
        $pass1 = sha1($_POST['pass1']);
        $pass2 = $_POST['pass2'];
        $valid=true;
    
    
    // Vérifie si un prenom a été entré
    if(empty($_POST['prenom']))
    {
        $err_prenom= 'Vous devez entrer votre prénom, laisser la case blanche, pas fort...';
        $valid=false;
    }
    
    if (preg_match('/[^a-z\s-]/i',$prenom)) {
        $err_prenom2 = "Il n'a pas de caractères spéciaux dans un prénom !";
        $valid=false;
    }
    
    // Vérifie si un nom a été entré
    if(empty($_POST['nom']))
    {
        $err_nom= 'Vous devez entrer votre nom, laisser la case blanche, pas fort...';
        $valid=false;
    }
    
    if (preg_match('/[^a-z\s-]/i',$nom)) {
        $err_nom2 = "Il n'a pas de caractères spéciaux dans un nom !";
        $valid=false;
    }
    
    // Vérifie si une adresse a été entré
    if(empty($_POST['adresse']))
    {
        $err_adresse= 'Vous devez entrer votre adresse, laisser la case blanche, pas fort...';
        $valid=false;
    }
    
    
    // Vérifie si un tel a été entré
    if(empty($_POST['tel']))
    {
        $err_tel= 'Vous devez entrer votre numéro de téléphone, laisser la case blanche, pas fort... <br>';
        $valid=false;
    }
    
   
    
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $tel))
    {
      $err_tel2 = "format à respecter : 819-555-5555";
      $valid=false;
    }
    
   
    
    // Vérifie si un courriel a été entré
    
    if(empty($_POST['courriel']))
    {
        $err_courriel = "Sérieux, vous devez entrer un courriel.";
        $valid=false;
    }

    else
    {
        $courriel = test_input($_POST["courriel"]);
        // check if e-mail address is well-formed
        if (!filter_var($courriel, FILTER_VALIDATE_EMAIL) )
        {
            $err_courriel = "Mauvais format de courriel ou courriel invalide";
             $valid=false;
        } 
    }






 
   /* Vérifie si un courriel existe
 if ($result = true)
    {
       $err_courriel1 = "Courriel déjà utilisé";
      $valid=false;
    }
 */


     
        
    
    // Vérifie si bon mot de passe
    if(empty($_POST['pass1']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass1"]) === 0))
    {
        $err_pass1 = '<p class="errText">Le mot de passe doit être composé de au moins une lettre majuscule, un lettre minuscule, un chiffre et doit avoir 8 caractères de long.</p>';
        $valid=false;
    }
    
    // Vérifie si bon mot de passe
    if(empty($_POST['pass2']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass2"]) === 0))
    {
        $err_pass2 = '<p class="errText">Le mot de passe doit être composé de au moins une lettre majuscule, un lettre minuscule, un chiffre et doit avoir 8 caractères de long.</p>';
        $valid=false;
    }
    
    
    // Vérifie si bon mot de passe
    if($_POST['pass2'] != $_POST['pass1'])
    {
        $err_pass2 = '<p class="errText">La confirmation doit être identique au mot de passe.	</p>';
        $valid=false;
    }
  
    // Si tout est valide, on enregistre
    if($valid)
    {
        sauvegarde_membre();
        header('Location: http://localhost/banque/form_connect.php');
       
    }
    $conn->close();
}


?>



<!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="UTF-8">

    <!-- Liens externes -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Hamburger menu petit ecran -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Banqueroute - Création compte.</title>
    <link rel="stylesheet" type="text/css" href="https://ws1.postescanada-canadapost.ca/css/addresscomplete-2.30.min.css?key=bb83-bb42-ec84-pa81" />
    <script type="text/javascript" src="https://ws1.postescanada-canadapost.ca/js/addresscomplete-2.30.min.js?key=bb83-bb42-ec84-pa81"></script>
   </head>   
  <body>  
<header>
    
    <!-- Menu et entete -->
    <nav class="navbar navbar-expand-md navbar-light bg-dark">
        <div class="container-fluid">
            <a id="particuliers" class="navbar-brand" href="index.php">  <img src="https://i.ibb.co/vBWtY84/Logo-official.png" alt="Logo Banqueroute" height="50" ></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="first_menu" href="form_connect.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="first_menu" href="index.php"><i class="fas fa-angle-double-left"></i> Retour</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


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
    <h6>Entrer vos informations personnelles pour créer votre compte. Vous aurez accès à votre compte dans quelques instants.</h6>
  
    <br>

	<!--Formulaire de création de compte -->
    <form novalidate  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group row">

            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom..."  value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : '' ?>">
              <span class="erreur">  <?php echo $err_prenom;
                echo $err_prenom2;
                ?> </span>
            </div>

            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom"  placeholder="Votre nom..." value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : '' ?>">
              <span class="erreur">  <?php echo $err_nom;
                echo $err_nom2; ?> </span>
            </div>

            <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Votre adresse..." value="<?php echo isset($_POST['adresse']) ? $_POST['adresse'] : '' ?>">
             <span class="erreur">   <?php echo $err_adresse;?> </span>
            </div>

            <label for="tel" class="col-sm-2 col-form-label">téléphone</label>
            <div class="col-sm-10">
                <input type="text" pattern="^[0-9-+s()]*$"   class="form-control" id="tel" name="tel" placeholder="Votre téléphone..." value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : '' ?>">
              <span class="erreur">  <?php echo $err_tel;
                 echo $err_tel2; 
                 ?> </span>
            </div>

            <label for="pass1" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" pattern=".{6,}" class="form-control" id="pass1" name="pass1" placeholder="Votre mot de passe à 8 caractères" value="<?php echo isset($_POST['pass1']) ? $_POST['pass1'] : '' ?>">
            <span class="erreur">   <?php echo $err_pass1; ?> </span>
            </div>

            <label for="pass2" class="col-sm-2 col-form-label">Mot de passe (bis)</label>
            <div class="col-sm-10">
                <input type="password" pattern="{6,}"  class="form-control" id="pass2" name="pass2" placeholder="Confirmer votre mot de passe" value="<?php echo isset($_POST['pass2']) ? $_POST['pass2'] : '' ?>">
              <span class="erreur">  <?php echo $err_pass2; ?> </span>
            </div>

            <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="courriel" onkeyup="validate_email()" name="courriel" placeholder="Votre courriel.." oninvalid="setCustomValidity('Format de courriel invalide')" oninput="setCustomValidity('')" value="<?php echo isset($_POST['courriel']) ? $_POST['courriel'] : '' ?>">
                
             <span id="erreur_courriel" class="erreur">   
             <?php 
             echo $err_courriel;
            echo $err_courriel1;
             ?>
                </span>
            </div>

            <div >
                <br>
                &nbsp; &nbsp;<input type="submit" id="button_submit" value="S'inscrire" name="submit" class="btn btn-primary">
                &nbsp; <a class="btn btn-primary" href="index.php"  role="button">Retour</a>
            </div>
            <br>
        </div>
    </form>
    <br>
    
    <script>
    
		//Fonction Ajax pour  validé si le email éxiste dans la BD
          function validate_email()
		{
          
  
           
		var courriel = document.getElementById("courriel").value;
       
		var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
           var courriel_result = this.responseText;


         
       
        
        if (courriel_result == "parfait")
        {
			document.getElementById("button_submit").disabled = false;
			document.getElementById("erreur_courriel").innerHTML = "";
        }
		else 
		{
			document.getElementById("button_submit").disabled = true;
			document.getElementById("erreur_courriel").innerHTML = "Courriel déjà utilié !";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/validate_email.php?courriel="+courriel, true);
        xhttp.send();
       
}
        
        
    </script>





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


</body>
</html>