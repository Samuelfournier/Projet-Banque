<?php session_start(); ?>
<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
date_default_timezone_set('America/New_York');



/*
Page qui reçoit par ajax l'information pour la suppression d'un compte et le transfert du solde d'un compte à un autre

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

$futur_compte = $_POST["compte"];
$no_compte = $_POST["no_compte"];
$solde = $_POST["solde"];

//Si il y a un futur compte
if(isset($futur_compte)){


		//prend le solde actuel
        $stmt = $conn->prepare("SELECT solde FROM comptes WHERE no_compte=? "); 
        $stmt->bind_param("s",$futur_compte);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($compte_result_source); 
        $stmt->fetch();
        $stmt->close();
        
        //update le solde du futur compte
        $stmt2 = $conn->prepare("UPDATE comptes SET solde=solde + ? WHERE no_compte=?");
        $stmt2->bind_param('ss',$solde, $futur_compte);
        $stmt2->execute();
        $stmt2->close();
        
        
        $date = date("Y-m-d h:i");
        $type = "Suppresion de compte";
        $raison = "Suppresion du compte $no_compte";
        
        $solde_calculer = $compte_result_source + $solde;

		//insère la transaction
        $stmt3 = $conn->prepare("INSERT INTO transactions (timestamp, type, no_compte_debit, description, montant, solde) VALUES (?, ?, ?, ?, ?,?)");
        $stmt3->bind_param("ssssss", $date, $type, $futur_compte, $raison, $solde, $solde_calculer);
        $stmt3->execute();
        $stmt3->close();



	//supprime les transactions de l'ancien compte
	$stmt4 = $conn->prepare("DELETE FROM transactions WHERE no_compte_debit=?"); 
	$stmt4->bind_param("s", $no_compte);
	$stmt4->execute();
	$stmt4->store_result();
	$stmt4->close();



	//supprime le compte
	$stmt4 = $conn->prepare("delete from comptes WHERE no_compte = ?"); 
	$stmt4->bind_param("s", $no_compte);
	$stmt4->execute();
	$stmt4->store_result();
	$stmt4->close();


}

else{
//supprime les transactions de l'ancien compte  
$stmt = $conn->prepare("DELETE FROM transactions WHERE no_compte_debit=?"); 
$stmt->bind_param("s", $no_compte);
$stmt->execute();
$stmt->store_result();


//supprime le compte
$stmt1 = $conn->prepare("delete from comptes WHERE no_compte = ?"); 
$stmt1->bind_param("s", $no_compte);
$stmt1->execute();
$stmt1->store_result();

$stmt->close();
$stmt1->close();
$conn->close();
}
?>