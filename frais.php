<?php header('Access-Control-Allow-Origin: *'); ?>
<?
date_default_timezone_set('America/New_York');


/*
Page applique les frais mensuels au compte qui ont un frais mensuel supérieure à 0
Appeler avec un cron job 1 fois par mois

*/

$date = date("Y-m-d h:i");
$frais_mensuel = "frais_mensuel";




$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                
                
                  $stmt2 = $conn->prepare("SELECT solde,frais_mensuel,no_compte FROM comptes WHERE frais_mensuel > 0"); 
                    $stmt2->execute();
                    $results = $stmt2->get_result();


          
            
                
                
                  $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");

             $stmt3->bind_param("ssssss", $date, $frais_mensuel, $result_compte, $frais_mensuel,$montant , $solde);
           
            foreach($results as $result)
            {
                $result_compte = $result["no_compte"];
                $montant = $result["frais_mensuel"];
                $solde = $result["solde"] - $montant;
                $stmt3->execute();
            
            }
            $stmt2->close();
            $stmt3->close();
                
                
                $stmt = $conn->prepare("UPDATE comptes SET solde=solde - frais_mensuel");
                $stmt->execute();
                $stmt->close();
                
     
          
            $conn->close();
                 
        
?>