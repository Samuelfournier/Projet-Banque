<?php header('Access-Control-Allow-Origin: *'); ?>
<?
date_default_timezone_set('America/New_York');

$compte = $_GET["compte"];



/*
	Retourne le solde du compte pour vérifier si il a assez pour un paiement
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
     
       $stmt = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
    
    $stmt->bind_param("s",$compte);
    $stmt->execute();
    $stmt->store_result();
   $stmt->bind_result($compte_result); 
   $stmt->fetch();
     
     echo $compte_result;
     
    $stmt->close();
    $conn->close();

?>