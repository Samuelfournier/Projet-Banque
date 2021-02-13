<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
date_default_timezone_set('America/New_York');

/*
Page qui reçoit par ajax l'information pour un paiement, l'envoie à un API de interac fictif fourni par l'enseignant

*/



$compte = $_POST["compte"];
$montant = $_POST["montant"];
$fournisseur = $_POST["fournisseur"];
$banque = "Banqueroute";



$url = 'https://api.interax.ca/factures.json';

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = ["compte" => $compte, "fournisseur" => $fournisseur,"montant" => $montant, "banque" => $banque];

$payload = json_encode($data);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
$response = curl_setopt($ch, CURLOPT_POST, true);

//execute the POST request
$result = curl_exec($ch);

$info = curl_getinfo($ch);

$info2 =  $info['http_code'];


//close cURL resource
curl_close($ch);





//Si l'envoie à fonctionner
if($info2 == 200){
$servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
 
     
		//sélection des informations du compte
		$stmt = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
    
        $stmt->bind_param("s",$compte);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($compte_result); 
        $stmt->fetch();
     
        $stmt->close(); 
     
		$solde =  $compte_result - $montant;
		$montant2 = "-".  $montant;

            //update du solde    
            $stmt2 = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
            $stmt2->bind_param('ss',$montant, $compte);
            $stmt2->execute();
            $stmt2->close();

$date = date("Y-m-d h:i");
$paiement = "Paiement";
$frais_de_service = "Frais de Service";

			$description = "Paiement vers $fournisseur ";

			//Ajout dans la table transactions
            $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
            $stmt3->bind_param("ssssss", $date, $paiement, $compte, $description, $montant2, $solde);

            $stmt3->execute();

            $stmt3->close();
            
            $frais_de_paiement = 2;
             $solde_2 = $solde -2;
             $frais_de_paiement2 = "-". $frais_de_paiement;
             
             
            //frais par paiement de 2 dollars
            $stmt4 = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
            $stmt4->bind_param('ss',$frais_de_paiement, $compte);
            $stmt4->execute();
            $stmt4->close();
            
            
            $stmt5 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
            $stmt5->bind_param("ssssss", $date, $paiement, $compte, $frais_de_service, $frais_de_paiement2, $solde_2);

            $stmt5->execute();

            $stmt5->close();
             
             
             

            $conn->close();
}

?>