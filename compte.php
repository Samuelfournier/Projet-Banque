<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');



/*
Page qui recoit en AJAX un numéro de compte qui permet de validé si le compte entré par l'utilisateur lors d'un transfert inter-banques existe. 
Retourne Introuvable si non trouvé

*/

$compte = $_GET["compte"];



$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
     
       $stmt = $conn->prepare("SELECT no_compte FROM comptes WHERE no_compte=?"); 
    
    $stmt->bind_param("s",$compte);
    $stmt->execute();
    $stmt->store_result();
   $stmt->bind_result($compte_result); 
   $stmt->fetch();
   
   $introuvable = "introuvable";
   
   if ($stmt->num_rows == 1) 
     { 
      echo $compte_result;
   }
   else
  {
       echo $introuvable;
  }
     
     
     
    $stmt->close();
    $conn->close();

?>