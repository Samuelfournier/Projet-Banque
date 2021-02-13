<?php header('Access-Control-Allow-Origin: *'); ?>
<?
date_default_timezone_set('America/New_York');


/*
API qui reçoit les informations du virement interac et qui ajoute la transactions et le solde à l'utilisateur

*/


$json = file_get_contents('php://input');
$data = json_decode($json);


$compte = $data->compte;
$transit = $data->transit;
$montant = $data->montant;




$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }


        $stmt = $conn->prepare("SELECT no_compte,solde FROM comptes WHERE no_compte=? "); 
        $stmt->bind_param("s",$compte);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($compte_result,$solde_actuel); 
        $stmt->fetch();
        
        
        if ($stmt->num_rows == 1 and $transit == 815) 
    { 
   $statut = "OK";
   
   $solde_reporter = $solde_actuel + $montant;
   
        $stmt2 = $conn->prepare("UPDATE comptes SET solde=solde + ? WHERE no_compte=?");
        $stmt2->bind_param('ss',$montant, $compte);
        $stmt2->execute();
        $stmt2->close();
        
    $date = date("Y-m-d h:i");
    $type = "Virement Interac reçu";
        
        $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
        $stmt3->bind_param("ssssss", $date, $type, $compte, $type, $montant, $solde_reporter);
        $stmt3->execute();
        $stmt3->close();
        
        
        echo $statut;
   
    }
    
    else
    {
        $statut = "FAILURE";
        echo $statut;
    }
  
     
     
         $stmt->close();



?>