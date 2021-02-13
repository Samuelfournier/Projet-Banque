<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');


/*
Page qui recoit en AJAX tout les informations nécessaires pour la création d'un compte.

*/


$membres = $_POST["membres"];
$type = $_POST["type"];
$frais = $_POST["frais"];
$balance = $_POST["balance"];
$interet = $_POST["interet"];
$description = $_POST["description"];
$no_banque = 1;
$today_date = date("Y+-m-d h:i:s");
$d = null;
$solde = 200;

$type_C = "Création de compte";






$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                
                
                
                
                
        $stmt = $conn->prepare("INSERT INTO comptes (no_membre, no_banque, type, description, solde, frais_mensuel, balance_min, interet_quotidien, date_ouverture, date_fermeture) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssssssssss",$membres , $no_banque,$type, $description, $solde, $frais, $balance, $interet, $today_date,$d);
		$result = $stmt->execute();
        $stmt->store_result();
        $stmt->close();
        
        
        
        
        $stmt2 = $conn->prepare("SELECT comptes.no_compte FROM comptes WHERE comptes.no_membre = ? AND comptes.type = ? AND comptes.date_fermeture IS null"); 
        $stmt2->bind_param("ss",$membres,$type);
        $stmt2->execute();
        $stmt2->store_result();
        $stmt2->bind_result($compte_result); 
        $stmt2->fetch();
        
        
        
        
        $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
        $stmt3->bind_param("ssssss", $today_date, $type_C, $compte_result, $type_C, $solde, $solde);

        $stmt3->execute();

        $stmt3->close();
        
        $conn->close();
                
                ?>