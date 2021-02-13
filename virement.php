<?php header('Access-Control-Allow-Origin: *'); ?>
<?
date_default_timezone_set('America/New_York');


/*
Page qui reçoit par ajax l'information pour un virement interac, l'envoie à un API de interac fictif fourni par l'enseignant
*/


$compte = $_POST["compte"];
$email = $_POST["email"];
$question = $_POST["question"];
$reponse = $_POST["reponse"];
$montant = $_POST["montant"];
$telephone = $_POST["telephone"];
$statut = "fail";



$question2 = trim($question);
$reponse2 = trim($reponse);



if(empty($question2) or empty($reponse2)){
echo (json_encode($statut));
}


else{
$url = 'https://api.interax.ca/interax.json';

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = ["email" => $email, "question" => $question,"password" => $reponse, "montant" => $montant, "tel" => $telephone];

$payload = json_encode($data);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_POST, true);

//execute the POST request
$result = curl_exec($ch);

$info = curl_getinfo($ch);

$info2 =  $info['http_code'];

//close cURL resource
curl_close($ch);
}






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
   
     
       $stmt3 = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
    
    $stmt3->bind_param("s",$compte);
    $stmt3->execute();
    $stmt3->store_result();
   $stmt3->bind_result($compte_result); 
   $stmt3->fetch();
     
    $stmt3->close(); 
     
 $solde =  $compte_result - $montant;
                
$stmt = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
$stmt->bind_param('ss',$montant, $compte);
$stmt->execute();
$stmt->close();

$date = date("Y-m-d h:i");
$virement = "Virement";
$description = "Virement Interac";


$frais_de_service = "Frais de Service";
$frais_de_paiement = 2;
$solde_2 = $solde -2;

$montant2 = "-". $montant;
$frais_de_paiement2 = "-". $frais_de_paiement;


 $stmt2 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
        $stmt2->bind_param("ssssss", $date, $virement, $compte, $description, $montant2, $solde);

$stmt2->execute();

$stmt2->close();


$stmt4 = $conn->prepare("UPDATE comptes SET solde=solde - ? WHERE no_compte=?");
            $stmt4->bind_param('ss',$frais_de_paiement, $compte);
            $stmt4->execute();
            $stmt4->close();
            
            
            $stmt5 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
     
            $stmt5->bind_param("ssssss", $date, $virement, $compte, $frais_de_service, $frais_de_paiement2, $solde_2);

            $stmt5->execute();

            $stmt5->close();

$conn->close();

}

?>