<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');



/*
Page qui reçoit par ajax l'information pour un virement inter banque
*/


$compte = $_POST["compte"];
$cible = $_POST["cible"];
$raison = $_POST["raison"];
$montant = $_POST["montant"];





$valid = true;



    if(empty($_POST['cible']))
    {
        $valid = false;
    }
     if(empty($_POST['raison']))
    {
       
        $valid = false;
    }
     if(empty($_POST['montant']))
    {
    
        $valid = false;
    }

    
    if($valid)
    { 
echo "succes";

$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                
                

     /// Select solde compte source
        $stmt = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
        $stmt->bind_param("s",$compte);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($compte_result_source); 
        $stmt->fetch();
     
    $stmt->close(); 
     
$solde_source =  $compte_result_source - $montant;
 
 // Select solde compte cible
        $stmt2 = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
    
        $stmt2->bind_param("s",$cible);
        $stmt2->execute();
        $stmt2->store_result();
        $stmt2->bind_result($compte_result_cible); 
        $stmt2->fetch();
     
        $stmt2->close(); 
 
$solde_cible = $compte_result_cible + $montant;
 

 // Retirer du compte source...
         $stmt3 = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
        $stmt3->bind_param('ss',$montant, $compte);
        $stmt3->execute();
        $stmt3->close();
        
        
        $frais_de_paiement = 2;
        $solde_source2 = $solde_source -2;
        $frais_de_service = "Frais de Service";
        
      //  Frais de service
            $stmt7 = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
            $stmt7->bind_param('ss',$frais_de_paiement, $compte);
            $stmt7->execute();
            $stmt7->close();
            

          
        
        
         // ajouter au compte cible...
 
        $stmt5 = $conn->prepare("UPDATE comptes SET solde=solde + ? WHERE no_compte=?");
        $stmt5->bind_param('ss',$montant, $cible);
        $stmt5->execute();
        $stmt5->close();



///// inserer la transaction dans le compte source
$date = date("Y-m-d h:i");
$type = "Virement Inter Banques";
$montant2 = "-". $montant;
$frais_de_paiement2 = "-". $frais_de_paiement; 

        $stmt4 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
        $stmt4->bind_param("ssssss", $date, $type, $compte, $raison, $montant2, $solde_source);

        $stmt4->execute();

        $stmt4->close();



 ///// inserer la transaction dans le compte cible
 
        $stmt6  = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
        $stmt6->bind_param("ssssss", $date, $type, $cible, $raison, $montant, $solde_cible);

        $stmt6->execute();

        $stmt6->close();
        
        
        
          $stmt8 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
            $stmt8->bind_param("ssssss", $date, $type, $compte, $frais_de_service, $frais_de_paiement2, $solde_source2);
            $stmt8->execute();
            $stmt8->close();
    
    




$conn->close();

}

?>