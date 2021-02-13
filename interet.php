<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');


$date = date("Y-m-d h:i");
$interet = "Intérêt quotidien";

/*
Page applique l'intérêt mensuel au compte qui ont un de l'intérêt mensuel supérieure à 0
Appeler avec un cron job 1 fois par mois

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
                
                
                
                  $stmt2 = $conn->prepare("SELECT solde,interet_quotidien,no_compte FROM comptes WHERE interet_quotidien > 0"); 
                    $stmt2->execute();
                    $results = $stmt2->get_result();


          
            
                
                
                  $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");

             $stmt3->bind_param("ssssss", $date, $interet, $result_compte, $interet,$montant , $solde);
           
            foreach($results as $result)
            {
                $result_compte = $result["no_compte"];
                $montant = $result["solde"] * $result["interet_quotidien"]/100;
                $solde = $montant +  $result["solde"];
                $stmt3->execute();
            
            }
            $stmt2->close();
            $stmt3->close();
                
                
                $stmt = $conn->prepare("UPDATE comptes SET solde=solde + solde * interet_quotidien/100");
                $stmt->execute();
                $stmt->close();
                
     
          
            $conn->close();
                 
                 
         
?>