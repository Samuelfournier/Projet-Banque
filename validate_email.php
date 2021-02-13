<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');

$courriel = $_GET["courriel"];




/*
Page qui reçoit par ajax le courriel pour voir si il existe dans la BD

*/


$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
     // $solde-$montant   select solde et bind_ result, ajout colonne solde et $solde - $montant;    
     
       $stmt = $conn->prepare("SELECT courriel FROM membres WHERE courriel=?"); 
    
    $stmt->bind_param("s",$courriel);
    $stmt->execute();
    $stmt->store_result();
   $stmt->bind_result($courriel_result); 
   $stmt->fetch();
   
   $trouver = "Utiliser";
   $parfait = "parfait";
   
   if ($stmt->num_rows == 1) 
     { 
      echo $trouver;
   }
   else
  {
       echo $parfait;
  }
     
     
     
    $stmt->close();
    $conn->close();

?>