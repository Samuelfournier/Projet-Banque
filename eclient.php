<?php session_start(); ?>
<?php
date_default_timezone_set('America/New_York');

//Si la personne à envoyer par le courriel de connexion
if(isset($_POST["submit"])) 
{
    $courriel = $_POST['courriel'];
    $pass1 = sha1($_POST['pass1']);
    $pass = $_POST['pass1'];
    $todayDate = date("Y-m-d h:i:s");
    $IP = $_SERVER["REMOTE_ADDR"];
    $valid = true;
    
    $servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                
    //Vérifie si le client existe
    $stmt = $conn->prepare("SELECT courriel,mot_de_passe,no_membre,nom,prenom FROM membres WHERE courriel=? AND mot_de_passe=?"); 
    
    $stmt->bind_param("ss", $courriel, $pass1);
    $stmt->execute();
    $stmt->store_result();
   $stmt->bind_result($courriel_result, $mdp_result, $id, $nom, $prenom); 
   $stmt->fetch();
   
   
  

     if ($stmt->num_rows == 1) 
     { 
      $_SESSION["id"] = $id;
   }
   else
  {
       header('Location: http://localhost/banque/form_connect.php?error=true');
  }
    
    
    
    // $stmt2 = $conn->prepare("INSERT INTO membres_connexions (courriel, mot_de_passe, date, IP , statut) VALUES (?, ?, ?, ?, ?)");
     
     //$stmt2->bind_param("sssss", $courriel, $pass, $todayDate, $IP, $statut);
/*
if ($stmt->num_rows == 1) {
$statut = "valide";
}
else {
$statut = "invalide";
}
$stmt2->execute();
*/


$type_eparg = "epargne";
$type_cheq = "cheque";
$type_eparg2 = "epargne+";
$type_cheq2 = "cheque+";





// select compte cheques

$stmt3 = $conn->prepare("SELECT no_compte, description, Interet_quotidien, solde FROM comptes WHERE no_membre=? AND type=?");
$stmt3->bind_param("ss", $id , $type_cheq);
$stmt3->execute();
$stmt3->bind_result($no_compte_c, $description_c , $Interet_quotidien_c , $solde_c); 
$stmt3->fetch();
 
$stmt3->close();



// select compte epargne

$stmt4 = $conn->prepare("SELECT no_compte, description, Interet_quotidien, solde FROM comptes WHERE no_membre=? AND type=?");
$stmt4->bind_param("ss", $id , $type_eparg);
$stmt4->execute();
$stmt4->bind_result($no_compte_e, $description_e , $Interet_quotidien_e , $solde_e); 
$stmt4->fetch();
$stmt4->close();

// select compte cheques +


$stmt5 = $conn->prepare("SELECT no_compte, description, Interet_quotidien, solde FROM comptes WHERE no_membre=? AND type=?");
$stmt5->bind_param("ss", $id , $type_cheq2);
$stmt5->execute();
$stmt5->bind_result($no_compte_c2, $description_c2 , $Interet_quotidien_c2 , $solde_c2); 
$stmt5->fetch();
$stmt5->close();
// select compte epargne +


$stmt6 = $conn->prepare("SELECT no_compte, description, Interet_quotidien, solde FROM comptes WHERE no_membre=? AND type=?");
$stmt6->bind_param("ss", $id , $type_eparg2);
$stmt6->execute();
$stmt6->bind_result($no_compte_e2, $description_e2 , $Interet_quotidien_e2 , $solde_e2); 
$stmt6->fetch();

$stmt6->close();
//$stmt2->close();
$stmt->close();

    $conn->close();
    
   
   
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

}

else
{
     header('Location: https://ti-estrie.com/projet_final/form_connect.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script   src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script   src="scripts.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<script   src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<title>Banqueroute - Espace client</title>

<script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"> 
</script>
</head>
 <body>
<header>
<nav class="navbar navbar-expand-md navbar-light bg-dark">
<div class="container-fluid">

<a id="particuliers" class="navbar-brand" href="#">  <img src="https://i.ibb.co/vBWtY84/Logo-official.png" alt="Logo Banqueroute" height="50" ></a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarResponsive">

<ul  id="first_menu"  class="navbar-nav ">

<li class="nav-item">

 <a class="first_menu" href="#compte"> Particuliers </a>
 </li>

<li class="nav-item">

 <a class="first_menu" href="#compte"> Petite Entreprise </a>
 </li>
 <li class="nav-item">
  <a class="first_menu" href="#compte"> Grande entreprise </a>

</li>

</ul>

<ul class="navbar-nav ml-auto">

<li class="nav-item">
 <a class="first_menu" href="#compte"><i class="fas fa-user"></i><?php echo " Bonjour  $nom $prenom"; ?> </a>
 </li>
 <li class="nav-item">
  <a class="first_menu" href="index.php"><i class="fas fa-sign-in-alt"></i> Se déconnecter</a>

</li>

</ul>

</div>

</div>



</nav>

</header>

<script>

//////////////////////////////
///Datatables Cheques //////
//////////////////////////////
//////////////////////////////
$(document).ready(function() {
    $('#cheque').DataTable( {
        "language": {
            "lengthMenu": "",
            "search": "Rechercher:",
            "zeroRecords": "Aucune transactions trouvées",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "(filtrer dans _MAX_ enregistrement)",
            "paginate": {
      "next": "Page suivante",
      "previous": "page précédente"
      
    }
        },
        
        "order": [[ 1, "desc" ]],
        
        "searching": false,
        

        
        
       
         
        
    } );
} );

//////////////////////////////
///Datatables epargne //////
//////////////////////////////
//////////////////////////////

$(document).ready(function() {
    $('#epargne').DataTable( {
        "language": {
            "lengthMenu": "",
            "search": "Rechercher:",
            "zeroRecords": "Aucune transactions trouvées",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "(filtrer dans _MAX_ enregistrement)",
            "paginate": {
      "next": "Page suivante",
      "previous": "page précédente"
      
    }
        },
        
        "order": [[ 1, "desc" ]],
        
        "searching": false,
        
        
       
         
        
    } );
} );
//////////////////////////////
///Datatables cheque2 //////
//////////////////////////////
//////////////////////////////

$(document).ready(function() {
    $('#cheques2').DataTable( {
        "language": {
            "lengthMenu": "",
            "search": "Rechercher:",
            "zeroRecords": "Aucune transactions trouvées",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "(filtrer dans _MAX_ enregistrement)",
            "paginate": {
      "next": "Page suivante",
      "previous": "page précédente"
      
    }
        },
        
        "order": [[ 1, "desc" ]],
        
        "searching": false,
        
        
       
         
        
    } );
} );

//////////////////////////////
///Datatables epargne2 //////
//////////////////////////////
//////////////////////////////

$(document).ready(function() {
    $('#epargne2').DataTable( {
        "language": {
            "lengthMenu": "",
            "search": "Rechercher:",
            "zeroRecords": "Aucune transactions trouvées",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "(filtrer dans _MAX_ enregistrement)",
            "paginate": {
      "next": "Page suivante",
      "previous": "page précédente"
      
    }
        },
        
        "order": [[ 1, "desc" ]],
        
        "searching": false,
        
        
       
         
        
    } );
} );
</script>

  <div id="succes_message">
  </div>
  <div id="fail_message">
  </div>
       
       <br>
       <br>
       <div class="row" id="compte">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Chèques</a>
  <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Épargne</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Chèques +</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Épargne +</a>
    </div>
  </div>
  
  <?php
  $servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }

?>
  

  
  <!-- Compte client -->
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
        
         <!-- compte cheques -->
       <!-- compte cheques -->
       <!-- compte cheques -->
       <!-- compte cheques -->
        
      <div class="tab-pane fade show active" id="list-home" role="tabpanel">
          
          
         <?php
		 
         //Si le compte chèques existe fait le UI
         if($no_compte_c == null) {
echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#C_creation_compte'>Créez vous un compte chèques !</button>";         }
         else {
 $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS date1, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ? ORDER BY transactions.no_transaction DESC LIMIT 3");
            $stmt->bind_param("s",$no_compte_c);
            $stmt->execute();
            $results = $stmt->get_result();

         echo "<h4 class='nom_compte'> $description_c </h4>
          <h5 class='no_compte'> Votre numéro de compte / Transit : $no_compte_c / 815 </h5>
 <br>
 <br>
 
 <div class='hide'>
  <strong>   Balance </strong>   <br> $solde_c $
 </div>
 
  <div class='hide'>
  <strong>  Intérêt  </strong>  <br> $Interet_quotidien_c %
 </div>
          
      <div class='container'>
<div class='floatLeft'>
    
<tr>
    <table  id='table_titre' class='table table-borderless'>
<tr>
    <td class='balance'> Balance ($)
<tr>
    <td >  $solde_c</td>

</tr>
<tr>
    <td class='balance'>Interet (%)</td>

</tr>
<tr>
    <td>  $Interet_quotidien_c</td>

</tr>
</td>

</tr></table>
</div>



<div class='floatRight'>
<tr><table id='table_titre' class='table table-border'>
    
<thead>
    <tr>
      <th id='table_compte6'  scope='col'>Date</th>
      <th  id='table_compte4'  scope='col'>Descriptif</th>
      <th  id='table_compte5'  scope='col'>Montant ($)</th>
      <th id='table_compte7' scope='col'>Solde ($)</th>
    </tr>
  </thead><tbody>";
  
   foreach($results as $result)
{
echo "<tr id='tab_color'><td id='table_compte8'>".$result['date1']."</td><td id='table_compte9'>".$result['description']."</td><td id='table_compte10'>".$result['montant']."</td><td id='table_compte11'>".$result['solde']."</td></tr>";
}


echo "</tbody></tr></table>
</div>
</div>

<div id='bouton_compte'>

<button id='bouton_compte2' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C_paiement'>Paiement</button>

<button id='bouton_compte3' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C_Interac'>Virement Interac</button>
<button id='bouton_compte4' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C_inter'>Virement inter-banque</button>
<button id='bouton_compte5' type='button' class='btn btn-danger' data-toggle='modal' data-target='#C_supp'>Supprimer compte</button>

        
        
        </div>
 ";

$stmt->close();

         }
         
         ?>
         
          

          
      </div>
      
      <!--Les interface pour le compte cheque -->
	  
	  
	  <!--Fenêtre pour la création du compte cheque -->
 <div id="C_creation_compte" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Création <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
         <div id="form_paiement7" class="col-12">
 <div class="form-group row">
     
     <label  for="no_membre" class="col-sm-3 col-form-label">Membres :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_membre" name="no_membre" disabled value="<?php echo $id?>">
<br>
            </div>

            <label  for="type" class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="type" name="type"  disabled value="cheque">
<br>
            </div>
            
                 <label for="frais" class="col-sm-3 col-form-label">Frais mensuel ($) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="frais" name="frais" disabled value="2">
                <br>

            </div>
             
                 <label for="balance_min" class="col-sm-3 col-form-label">Balance Min ($)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="balance_min" name="balance_min" disabled value="0">
                <br>

            </div>
            
              
                 <label for="interet" class="col-sm-3 col-form-label">Intérêt (%)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="interet" name="interet" disabled value="0">
                <br>

            </div>
           
                 <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" maxlength="25" class="form-control" id="description" name="Description" placeholder="Description du compte">
                <br>

            </div>
            
            
            
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="creation_compte_c()">Créer le compte</button>
<br>

  </div>




        </div>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>
   

   <!--Fenêtre pour les paiements du compte cheque -->
 <div id="C_paiement" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
         <div class="paiement2">
         <h2 class="bleue">Paiement <br> de</h2>
        <h2 class="vert"> Facture</h2>
        </div>
        <br>
        <br>
        
         <div id="form_paiement8" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_p_c" class="col-sm-3 col-form-label">Compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_p_c" name="compte" disabled value="<?php echo $no_compte_c?>">
<br>
            </div>
                
                
            <label for="fournisseur_p_c" class="col-sm-3 col-form-label">Fournisseur :</label>
            <div class="col-sm-9">
                <select class="form-control" id="fournisseur_p_c">
                <option>Videotron S.E.N.C.</option>
                <option selected>Bell Canada Inc.</option>
                <option>Visa Scotia</option>
                <option>Visa Desjardins</option>
                <option>Mastercard BMO</option>
                </select>
<br>
            </div>
            
                 <label for="montant_p_c" class="col-sm-3 col-form-label">Montant</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="montant_p_c" onkeyup="montant_check_c()" name="montant" placeholder="montant...">
                 <small id="montanthelp_c" class="erreur"></small>
              
                <br>

            </div>
           

            <button type="button" id="paiement_p_c" class="btn btn-primary" data-dismiss="modal" onclick="Paiement_c()">Envoyer le paiement</button>


  </div>




        </div>
        
      </div>
        
        
    </div>
  </div>
</div>


	<!--Fenêtre pour les virements interax du compte cheque -->
<div id="C_Interac" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert"> interac</h2>
        </div>
        <br>
        <br>

 <div id="form_paiement9" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte" class="col-sm-2 col-form-label">Compte :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte" name="compte" disabled value="<?php echo $no_compte_c?>">
<br>
            </div>

            <label  for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="courriel" name="Courriel" onkeyup="ValidateEmail_c()" placeholder="L'adresse courriel du receveur">
                <small id="courrielhelp_v_c" class="erreur"></small>
<br>
            </div>
            
                 <label for="question" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="question" maxlength="25" name="Question" placeholder="Question de sécurité...">
                <br>

            </div>
             
                 <label for="password" class="col-sm-2 col-form-label">Reponse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" maxlength="25" name="Réponse" placeholder="Réponse de sécurité...">
                <br>

            </div>
            
              
                 <label for="montant" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant" onkeyup="montant_check_v_c()" name="montant" placeholder="montant...">
                <small id="montanthelp_v_c" class="erreur"></small>
                <br>

            </div>
           
                 <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telephone" maxlength="10" name="téléphone" placeholder="Numéro de téléphone...">
                <br>

            </div>
            
            
            
            
            <button type="button" id="virement_i_c" class="btn btn-primary" data-dismiss="modal" onclick="virement_interac_c()">Envoyer le virement</button>


  </div>




        </div>
      </div>  
      <br>
      <br>
        
        
    </div>
  </div>
</div>


	<!--Fenêtre pour les virement inter banque -->
<div id="C_inter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
            <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert">Inter-Banque</h2>
        </div>
        <br>
        <br>

<div id="form_paiement6" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_c_i" class="col-sm-2 col-form-label">De :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_c_i" name="compte" disabled value="<?php echo $no_compte_c?>">
<br>
            </div>

        
            
                 <label for="CompteCible_c" class="col-sm-2 col-form-label">Vers : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CompteCible_c"  onkeyup="compte_check_vi_c()" name="CompteCible" placeholder="Compte Cible...">
                <small id="comptehelp_vi_c" class="erreur"></small>
                <br>

            </div>
            
               <label for="Raison_c" class="col-sm-2 col-form-label">Raison :  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Raison_c"   maxlength="25" name="Raison" placeholder="Raison...">
                
                <br>

            </div>
            

                 <label for="montant_c_i" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_c_i" onkeyup="montant_check_vi_c()" name="montant" placeholder="montant...">
                <small id="montanthelp_vi_c" class="erreur"></small>
                <br>

            </div>
           
            
            
            
            
            
            <button type="button" id="virement_vi_c" class="btn btn-primary" data-dismiss="modal" onclick="virement_interB_c()">Envoyer le virement</button>


  </div>




        </div>
      </div>    
      <br>
      <br>
        
        
    </div>
  </div>
</div>

	<!--Fenêtre pour la suppresion du compte cheque -->
<div id="C_supp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Suppresion <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
        <br>
        <br>
        
        <div id="form_paiement18" class="col-12">
 <div class="form-group row">
     
     <label   class="col-sm-3 col-form-label">compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_c_supp" name="compte" disabled value="<?php echo $no_compte_c?>">
<br>
            </div>
            
             <label   class="col-sm-3 col-form-label">Solde  :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="solde_c_supp" name="Solde" disabled value="<?php echo $solde_c?>">
<br>
            </div>
            
             </div>
             </div>
        
        
        
         <?php
              
              $stmt = $conn->prepare("SELECT no_compte,type,description, solde FROM comptes WHERE no_membre = ? AND type != 'cheque' ");
                $stmt->bind_param("s",$id);
  


$stmt->execute();
$results = $stmt->get_result();
if ($results->num_rows >= 1)
{
    echo 
    "
    <h5 class='supp'> Transférer votre solde de $solde_c $ à un autre de vos comptes <br> avant de supprimer votre compte </h5>
    <br>
    <br>
    <div class='supp'><strong>Sélectionner le compte désiré</strong></div>
    <br>
    
    ";
    foreach ($results as $result)
            {

 
                     echo"   <div id='supp' class='form-check'>
                        <input class='form-check-input' type='radio' name='ChoixCompte'  value=".$result['no_compte']." checked>
                        <label class='form-check-label'> 
                        ".$result['type']." / ".$result['description']." / ".$result['solde']." $
                        </label>
                        </div>
                             ";
              }

}
else{
    echo 
    "
    <br>
    <br>
    <h2 class='supp'>Attention</h2>
    <h5 class='supp'>
    ceci est votre dernier compte avec nous. Cela veux dire que vous allez perdre votre solde de $solde_c $. </h5>
    ";
}




$stmt->close();

        
                ?>
        <br>
        <br>
        
        
        

        
                    <button id='supp' type="button" class="btn btn-danger" data-toggle="modal"  data-dismiss="modal" data-target="#supp_confirm_c">Supprimer le compte</button>
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
           <br>
           <br>
          
          <small>Veuillez prendre note que lors de la suppresion tout information sera supprimé et aucune trace de l'existance de votre compte sera présente dans notre base de donnée ainsi que dans celle des caisses desjardins.
          À la banque route la sécurité des usagers présent, passé et futur est notre priorité et c'est pour cela que notre directrice de sécurité informatique est maintenant diplomé dans le cours de Pâtisserie avec une moyenne de 59%.</small>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>


<div class="modal fade" id="supp_confirm_c" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment Supprimer le compte ? <br>
        Il sera impossible de revenir en arrière après la transaction.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_c()">confirmer</button>
      </div>
    </div>
  </div>
</div>
          
      
        <!-- compte epargne -->
         <!--compte epargne -->
        <!--compte epargne -->
       <!--compte epargne -->
      <div class="tab-pane fade" id="list-profile" role="tabpanel" >
          
          
         <?php
         //si le compte epargne existe, fait le UI
         if($no_compte_e == null) {
echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#E_creation_compte'>Créez vous un compte  Épargne !</button>";          }
        else {
 $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS date1, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ? ORDER BY transactions.no_transaction DESC LIMIT 3");
            $stmt->bind_param("s",$no_compte_e);
            $stmt->execute();
            $results = $stmt->get_result();

         echo "<h4 class='nom_compte'> $description_e </h4>
          <h5 class='no_compte'> Votre numéro de compte / Transit : $no_compte_e / 815 </h5>
 <br>
 <br>
 
 <div class='hide'>
  <strong>   Balance </strong>   <br> $solde_e $
 </div>
 
  <div class='hide'>
  <strong>  Intérêt  </strong>  <br> $Interet_quotidien_e %
 </div>
          
      <div class='container'>
<div class='floatLeft'>
    
<tr>
    <table id='table_titre'  class='table table-borderless'>
<tr>
    <td class='balance'> Balance ($)
<tr>
    <td >  $solde_e</td>

</tr>
<tr>
    <td class='balance'>Interet (%)</td>

</tr>
<tr>
    <td>  $Interet_quotidien_e</td>

</tr>
</td>

</tr></table>
</div>



<div class='floatRight'>
<tr><table id='table_titre'  class='table table-border'>
    
<thead>
    <tr>
      <th id='table_compte6'  scope='col'>Date</th>
      <th  id='table_compte4'  scope='col'>Descriptif</th>
      <th  id='table_compte5'  scope='col'>Montant ($)</th>
      <th id='table_compte7' scope='col'>Solde ($)</th>
    </tr>
  </thead><tbody>";
  
   foreach($results as $result)
{
echo "<tr id='tab_color'><td id='table_compte8'>".$result['date1']."</td><td id='table_compte9'>".$result['description']."</td><td id='table_compte10'>".$result['montant']."</td><td id='table_compte11'>".$result['solde']."</td></tr>";
}


echo "</tbody></tr></table>
</div>
</div>

<div id='bouton_compte'>

<button id='bouton_compte2' type='button' class='btn btn-success' data-toggle='modal' data-target='#E_paiement'>Paiement</button>

<button id='bouton_compte3' type='button' class='btn btn-success' data-toggle='modal' data-target='#E_Interac'>Virement Interac</button>
<button id='bouton_compte4' type='button' class='btn btn-success' data-toggle='modal' data-target='#E_inter'>Virement inter-banque</button>
<button id='bouton_compte5' type='button' class='btn btn-danger' data-toggle='modal' data-target='#E_supp'>Supprimer compte</button>
        
        </div>
 ";

$stmt->close();

         }
         
         ?>
      </div>
      
    

<!--Fenêtre pour la suppresion du compte epargne -->
<div id="E_supp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Suppresion <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
        <br>
        <br>
        
        <div id="form_paiement19" class="col-12">
 <div class="form-group row">
     
     <label   class="col-sm-3 col-form-label">compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_e_supp" name="compte" disabled value="<?php echo $no_compte_e?>">
<br>
            </div>
            
             <label   class="col-sm-3 col-form-label">Solde  :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="solde_e_supp" name="Solde" disabled value="<?php echo $solde_e?>">
<br>
            </div>
            
             </div>
             </div>
        
        
        
         <?php
              
              $stmt = $conn->prepare("SELECT no_compte,type,description, solde FROM comptes WHERE no_membre = ? AND type != 'epargne' ");
                $stmt->bind_param("s",$id);
  


$stmt->execute();
$results = $stmt->get_result();
if ($results->num_rows >= 1)
{
    echo 
    "
    <h5 class='supp'> Transférer votre solde de $solde_e $ à un autre de vos comptes <br> avant de supprimer votre compte </h5>
    <br>
    <br>
    <div class='supp'><strong>Sélectionner le compte désiré</strong></div>
    <br>
    
    ";
    foreach ($results as $result)
            {

 
                     echo"   <div id='supp' class='form-check'>
                        <input class='form-check-input' type='radio' name='ChoixCompte_e'  value=".$result['no_compte']." checked>
                        <label class='form-check-label'> 
                        ".$result['type']." / ".$result['description']." / ".$result['solde']." $
                        </label>
                        </div>
                             ";
              }

}
else{
    echo 
    "
    <br>
    <br>
    <h2 class='supp'>Attention</h2>
    <h5 class='supp'>
    ceci est votre dernier compte avec nous. Cela veux dire que vous allez perdre votre solde de $solde_e $. </h5>
    ";
}




$stmt->close();

        
                ?>
        <br>
        <br>
        
        
        

        
                    <button id='supp1' type="button" class="btn btn-danger" data-toggle="modal"  data-dismiss="modal" data-target="#supp_confirm_e">Supprimer le compte</button>
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
           <br>
           <br>
          
          <small>Veuillez prendre note que lors de la suppresion tout information sera supprimé et aucune trace de l'existance de votre compte sera présente dans notre base de donnée ainsi que dans celle des caisses desjardins.
          À la banque route la sécurité des usagers présent, passé et futur est notre priorité et c'est pour cela que notre directrice de sécurité informatique est maintenant diplomé dans le cours de Pâtisserie avec une moyenne de 59%.</small>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>

<div class="modal fade" id="supp_confirm_e" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment Supprimer le compte ? <br>
        Il sera impossible de revenir en arrière après la transaction.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_e()">confirmer</button>
      </div>
    </div>
  </div>
</div>
      
      
      
      <!--Fenêtre pour la création du compte epargne -->
       <div id="E_creation_compte" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Création <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
         <div id="form_paiement11" class="col-12">
 <div class="form-group row">
     
     <label  for="no_membre_e" class="col-sm-3 col-form-label">Membres :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_membre_e" name="no_membre" disabled value="<?php echo $id ?>">
<br>
            </div>

            <label  for="type_e" class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="type_e" name="type"  disabled value="epargne">
<br>
            </div>
            
                 <label for="frais_e" class="col-sm-3 col-form-label">Frais mensuel ($) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="frais_e" name="frais" disabled value="0">
                <br>

            </div>
             
                 <label for="balance_min_e" class="col-sm-3 col-form-label">Balance Min ($)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="balance_min_e" name="balance_min" disabled value="0">
                <br>

            </div>
            
              
                 <label for="interet_e" class="col-sm-3 col-form-label">Intérêt (%)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="interet_e" name="interet" disabled value="2">
                <br>

            </div>
           
                 <label for="description_e" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" maxlength="25" class="form-control" id="description_e" name="Description" placeholder="Description du compte">
                <br>

            </div>
            
            
            
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="creation_compte_e()">Créer le compte</button>


  </div>




        </div>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>
      
	  <!--Fenêtre pour les paiements du compte epargne-->
 <div id="E_paiement" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
         <div class="paiement2">
         <h2 class="bleue">Paiement <br> de</h2>
        <h2 class="vert"> Facture</h2>
        </div>
        <br>
        <br>
        
         <div id="form_paiement13" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_p_e" class="col-sm-3 col-form-label">Compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_p_e" name="compte" disabled value="<?php echo $no_compte_e?>">
<br>
            </div>
                
                
            <label for="fournisseur_p_e" class="col-sm-3 col-form-label">Fournisseur :</label>
            <div class="col-sm-9">
                <select class="form-control" id="fournisseur_p_e">
                <option>Videotron S.E.N.C.</option>
                <option selected>Bell Canada Inc.</option>
                <option>Visa Scotia</option>
                <option>Visa Desjardins</option>
                <option>Mastercard BMO</option>
                </select>
<br>
            </div>
            
                 <label for="montant_p_e" class="col-sm-3 col-form-label">Montant</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="montant_p_e" onkeyup="montant_check_e()" name="montant" placeholder="montant...">
                 <small id="montanthelp_e" class="erreur"></small>
                <br>

            </div>
           

            <button type="button"  id="paiement_p_e" class="btn btn-primary" data-dismiss="modal" onclick="Paiement_e()">Envoyer le paiement</button>


  </div>




        </div>
        
      </div>
        
        
    </div>
  </div>
</div>

<!--Fenêtre pour les virements interax du compte epargne-->
<div id="E_Interac" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert"> interac</h2>
        </div>
        <br>
        <br>

<div id="form_paiement2" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_e" class="col-sm-2 col-form-label">Compte :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_e" name="compte" disabled value="<?php echo $no_compte_e?>">
<br>
            </div>

            <label  for="courriel_e" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="courriel_e" name="Courriel" onkeyup="ValidateEmail_e()" placeholder="L'adresse courriel du receveur">
                <small id="courrielhelp_v_e" class="erreur"></small>
<br>
            </div>
            
                 <label for="question_e" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="question_e" maxlength="25" name="Question" placeholder="Question de sécurité...">
                <br>

            </div>
             
                 <label for="password_e" class="col-sm-2 col-form-label">Reponse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password_e" maxlength="25" name="Réponse" placeholder="Réponse de sécurité...">
                <br>

            </div>
            
              
                 <label for="montant_e" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_e" onkeyup="montant_check_v_e()" name="montant" placeholder="montant...">
                <small id="montanthelp_v_e" class="erreur"></small>
                <br>

            </div>
           
                 <label for="telephone_e" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telephone_e" maxlength="10" name="téléphone" placeholder="Numéro de téléphone...">
                <br>

            </div>
            
            
            
            
            <button type="button" id="virement_i_e" class="btn btn-primary" data-dismiss="modal" onclick="virement_interac_e()">Envoyer le virement</button>


  </div>




        </div>
      </div>  
      <br>
      <br>
        
        
    </div>
  </div>
</div>

<!--Fenêtre pour les virement inter banque du compte epargne -->
<div id="E_inter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
      <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert">Inter-Banque</h2>
        </div>
        <br>
        <br>

<div id="form_paiement16" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_e_i" class="col-sm-2 col-form-label">De :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_e_i" name="compte" disabled value="<?php echo $no_compte_e?>">
<br>
            </div>

        
            
                 <label for="CompteCible_e" class="col-sm-2 col-form-label">Vers : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CompteCible_e" onkeyup="compte_check_vi_e()" name="CompteCible" placeholder="Compte Cible...">
                <small id="comptehelp_vi_e" class="erreur"></small>
                <br>

            </div>
            
               <label for="Raison_e" class="col-sm-2 col-form-label">Raison :  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Raison_e"  maxlength="25" name="Raison" placeholder="Raison...">
                
                <br>

            </div>
            

                 <label for="montant_e_i" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_e_i" name="montant" onkeyup="montant_check_vi_e()" placeholder="montant...">
                <small id="montanthelp_vi_e" class="erreur"></small>
                <br>

            </div>
           
            
            
            
            
            
            <button type="button" id="virement_vi_e" class="btn btn-primary" data-dismiss="modal" onclick="virement_interB_e()">Envoyer le virement</button>


  </div>




        </div>
      </div>    
      <br>
      <br>
        
        
    </div>
  </div>
</div>
      
          <!-- compte cheques + -->
         <!-- compte cheques + -->
          <!-- compte cheques + -->
         <!-- compte cheques + -->
      <div class="tab-pane fade" id="list-messages" role="tabpanel" >
          
        <?php
         //si le compte cheque+ existe fait le UI
         if($no_compte_c2 == null) {
           echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#C2_creation_compte'>Créez vous un compte chèques+ !</button>";
         }
         else {
 $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS date1, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ? ORDER BY transactions.no_transaction DESC LIMIT 3");
            $stmt->bind_param("s",$no_compte_c2);
            $stmt->execute();
            $results = $stmt->get_result();

         echo "<h4 class='nom_compte'> $description_c2 </h4>
          <h5 class='no_compte'> Votre numéro de compte / Transit : $no_compte_c2 / 815 </h5>
 <br>
 <br>
 
 <div class='hide'>
  <strong>   Balance </strong>   <br> $solde_c2 $
 </div>
 
  <div class='hide'>
  <strong>  Intérêt  </strong>  <br> $Interet_quotidien_c2 %
 </div>
          
      <div class='container'>
<div class='floatLeft'>
    
<tr>
    <table id='table_titre'  class='table table-borderless'>
<tr>
    <td class='balance'> Balance ($)
<tr>
    <td > $solde_c2</td>

</tr>
<tr>
    <td class='balance'>Interet (%)</td>

</tr>
<tr>
    <td> $Interet_quotidien_c2</td>

</tr>
</td>

</tr></table>
</div>



<div class='floatRight'>
<tr><table  id='table_titre' class='table table-border'>
    
<thead>
    <tr>
      <th id='table_compte6'  scope='col'>Date</th>
      <th  id='table_compte4'  scope='col'>Descriptif</th>
      <th  id='table_compte5'  scope='col'>Montant ($)</th>
      <th id='table_compte7' scope='col'>Solde ($)</th>
    </tr>
  </thead><tbody>";
  
   foreach($results as $result)
{
echo "<tr id='tab_color'><td id='table_compte8'>".$result['date1']."</td><td id='table_compte9'>".$result['description']."</td><td id='table_compte10'>".$result['montant']."</td><td id='table_compte11'>".$result['solde']."</td></tr>";
}


echo "</tbody></tr></table>
</div>
</div>

<div id='bouton_compte'>

<button id='bouton_compte2' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C2_paiement'>Paiement</button>

<button id='bouton_compte3' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C2_Interac'>Virement Interac</button>
<button id='bouton_compte4' type='button' class='btn btn-primary' data-toggle='modal' data-target='#C2_inter'>Virement inter-banque</button>
<button id='bouton_compte5' type='button' class='btn btn-danger' data-toggle='modal' data-target='#C2_supp'>Supprimer compte</button>
        
        </div>
 ";

$stmt->close();

         }
         
         ?>

</div>


<div id="C2_supp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Suppresion <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
        <br>
        <br>
        
        <div id="form_paiement20" class="col-12">
 <div class="form-group row">
     
     <label   class="col-sm-3 col-form-label">compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_c2_supp" name="compte" disabled value="<?php echo $no_compte_c2?>">
<br>
            </div>
            
             <label   class="col-sm-3 col-form-label">Solde  :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="solde_c2_supp" name="Solde" disabled value="<?php echo $solde_c2?>">
<br>
            </div>
            
             </div>
             </div>
        
        
        
         <?php
              
              $stmt = $conn->prepare("SELECT no_compte,type,description, solde FROM comptes WHERE no_membre = ? AND type != 'cheque+' ");
                $stmt->bind_param("s",$id);
  


$stmt->execute();
$results = $stmt->get_result();
if ($results->num_rows >= 1)
{
    echo 
    "
    <h5 class='supp'> Transférer votre solde de $solde_c2 $ à un autre de vos comptes <br> avant de supprimer votre compte </h5>
    <br>
    <br>
    <div class='supp'><strong>Sélectionner le compte désiré</strong></div>
    <br>
    
    ";
    foreach ($results as $result)
            {

 
                     echo"   <div id='supp' class='form-check'>
                        <input class='form-check-input' type='radio' name='ChoixCompte_c'  value=".$result['no_compte']." checked>
                        <label class='form-check-label'> 
                        ".$result['type']." / ".$result['description']." / ".$result['solde']." $
                        </label>
                        </div>
                             ";
              }

}
else{
    echo 
    "
    <br>
    <br>
    <h2 class='supp'>Attention</h2>
    <h5 class='supp'>
    ceci est votre dernier compte avec nous. Cela veux dire que vous allez perdre votre solde de $solde_c2 $. </h5>
    ";
}




$stmt->close();

        
                ?>
        <br>
        <br>
        
        
        

        
                    <button id='supp2' type="button" class="btn btn-danger" data-toggle="modal"  data-dismiss="modal" data-target="#supp_confirm_c2">Supprimer le compte</button>
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
           <br>
           <br>
          
          <small>Veuillez prendre note que lors de la suppresion tout information sera supprimé et aucune trace de l'existance de votre compte sera présente dans notre base de donnée ainsi que dans celle des caisses desjardins.
          À la banque route la sécurité des usagers présent, passé et futur est notre priorité et c'est pour cela que notre directrice de sécurité informatique est maintenant diplomé dans le cours de Pâtisserie avec une moyenne de 59%.</small>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>


<div class="modal fade" id="supp_confirm_c2" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment Supprimer le compte ? <br>
        Il sera impossible de revenir en arrière après la transaction.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_c2()">confirmer</button>
      </div>
    </div>
  </div>
</div>



       <div id="C2_creation_compte" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Création <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
         <div id="form_paiement14" class="col-12">
 <div class="form-group row">
     
     <label  for="no_membre_c2" class="col-sm-3 col-form-label">Membres :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_membre_c2" name="no_membre" disabled value="<?php echo $id?>">
<br>
            </div>

            <label  for="type_c2" class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="type_c2" name="type"  disabled value="<?php echo $type_cheq2 ?>">
<br>
            </div>
            
                 <label for="frais_c2" class="col-sm-3 col-form-label">Frais mensuel ($) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="frais_c2" name="frais" disabled value="0">
                <br>

            </div>
             
                 <label for="balance_min_c2" class="col-sm-3 col-form-label">Balance Min ($)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="balance_min_c2" name="balance_min" disabled value="1000">
                <br>

            </div>
            
              
                 <label for="interet_c2" class="col-sm-3 col-form-label">Intérêt (%)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="interet_c2" name="interet" disabled value="0">
                <br>

            </div>
           
                 <label for="description_c2" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" maxlength="25" class="form-control" id="description_c2" name="Description" placeholder="Description du compte">
                <br>

            </div>
            
            
            
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="creation_compte_c2()">Créer le compte</button>


  </div>




        </div>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>

 <div id="C2_paiement" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
         <div class="paiement2">
         <h2 class="bleue">Paiement <br> de</h2>
        <h2 class="vert"> Facture</h2>
        </div>
        <br>
        <br>
        
         <div id="form_paiement15" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_p_c2" class="col-sm-3 col-form-label">Compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_p_c2" name="compte" disabled value="<?php echo $no_compte_c2?>">
<br>
            </div>
                
                
            <label for="fournisseur_p_c2" class="col-sm-3 col-form-label">Fournisseur :</label>
            <div class="col-sm-9">
                <select class="form-control" id="fournisseur_p_c2">
                <option>Videotron S.E.N.C.</option>
                <option selected>Bell Canada Inc.</option>
                <option>Visa Scotia</option>
                <option>Visa Desjardins</option>
                <option>Mastercard BMO</option>
                </select>
<br>
            </div>
            
                 <label for="montant_p_c2" class="col-sm-3 col-form-label">Montant</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="montant_p_c2" onkeyup="montant_check_c2()" name="montant" placeholder="montant...">
                <small id="montanthelp_c2" class="erreur"></small>
                <br>

            </div>
           

            <button type="button" id="paiement_p_c2" class="btn btn-primary" data-dismiss="modal" onclick="Paiement_c2()">Envoyer le paiement</button>


  </div>




        </div>
        
      </div>
        
        
    </div>
  </div>
</div>

<div id="C2_Interac" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert"> interac</h2>
        </div>
        <br>
        <br>

<div id="form_paiement3" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_c" class="col-sm-2 col-form-label">Compte :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_c" name="compte" disabled value="<?php echo $no_compte_c2?>">
<br>
            </div>

            <label  for="courriel_c" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="courriel_c" name="Courriel" onkeyup="ValidateEmail_c2()" placeholder="L'adresse courriel du receveur">
                <small id="courrielhelp_v_c2" class="erreur"></small>
<br>
            </div>
            
                 <label for="question_c" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="question_c" name="Question" maxlength="25" placeholder="Question de sécurité...">
                <br>

            </div>
             
                 <label for="password_c" class="col-sm-2 col-form-label">Reponse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password_c" name="Réponse" maxlength="25" placeholder="Réponse de sécurité...">
                <br>

            </div>
            
              
                 <label for="montant_c" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_c" onkeyup="montant_check_v_c2()" name="montant" placeholder="montant...">
                <small id="montanthelp_v_c2" class="erreur"></small>
                <br>

            </div>
           
                 <label for="telephone_c" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telephone_c" name="téléphone" maxlength="10" placeholder="Numéro de téléphone...">
                <br>

            </div>
            
            
            
            
            <button type="button" id="virement_i_c2" class="btn btn-primary" data-dismiss="modal" onclick="virement_interac_c2()">Envoyer le virement</button>


  </div>




        </div>
      </div>   
      <br>
      <br>
        
        
    </div>
  </div>
</div>


<div id="C2_inter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
                   <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert">Inter-Banque</h2>
        </div>
        <br>
        <br>

<div id="form_paiement17" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_c2_i" class="col-sm-2 col-form-label">De :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_c2_i" name="compte" disabled value="<?php echo $no_compte_c2?>">
<br>
            </div>

        
            
                 <label for="CompteCible_c2" class="col-sm-2 col-form-label">Vers : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CompteCible_c2" onkeyup="compte_check_vi_c2()" name="CompteCible" placeholder="Compte Cible...">
                <small id="comptehelp_vi_c2" class="erreur"></small>
                <br>

            </div>
            
               <label for="Raison_c2" class="col-sm-2 col-form-label">Raison :  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Raison_c2" maxlength="25"  name="Raison" placeholder="Raison...">
                
                <br>

            </div>
            

                 <label for="montant_c2_i" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_c2_i" onkeyup="montant_check_vi_c2()" name="montant" placeholder="montant...">
                <small id="montanthelp_vi_c2" class="erreur"></small>
                <br>

            </div>
           
            
            
            
            
            
            <button type="button" id="virement_vi_c2" class="btn btn-primary" data-dismiss="modal" onclick="virement_interB_c2()">Envoyer le virement</button>


  </div>




        </div>
      </div>    
      <br>
      <br>
        
        
    </div>
  </div>
</div>


          <!-- compte epargne + -->
         <!-- compte epargne + -->
         <!-- compte epargne + -->
      <!-- compte epargne + -->
       <div class="tab-pane fade" id="list-settings" role="tabpanel" >
          
       <?php
         // si le compte epargne + existe, fait le UI
         if($no_compte_e2 == null) {
           echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#E2_creation_compte'>Créez vous un compte  Épargne + !</button>";
         }
         else {
 $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS date1, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ? ORDER BY transactions.no_transaction DESC LIMIT 3");
            $stmt->bind_param("s",$no_compte_e2);
            $stmt->execute();
            $results = $stmt->get_result();

         echo "<h4 class='nom_compte'> $description_e2 </h4>
          <h5 class='no_compte'> Votre numéro de compte / Transit : $no_compte_e2 / 815 </h5>
 <br>
 <br>
 
 <div class='hide'>
  <strong>   Balance   </strong>   <br> $solde_e2 $
 </div>
 
  <div class='hide'>
  <strong>  Intérêt  </strong>  <br> $Interet_quotidien_e2 %
 </div>
          
      <div class='container'>
<div class='floatLeft'>
    
<tr>
    <table id='table_titre'  class='table table-borderless'>
<tr>
    <td class='balance'> Balance ($)
<tr>
    <td >  $solde_e2</td>

</tr>
<tr>
    <td class='balance'>Interet (%)</td>

</tr>
<tr>
    <td>  $Interet_quotidien_e2</td>

</tr>
</td>

</tr></table>
</div>



<div class='floatRight'>
<tr><table id='table_titre' class='table table-border'>
    
<thead>
    <tr>
      <th id='table_compte6'  scope='col'>Date</th>
      <th  id='table_compte4'  scope='col'>Descriptif</th>
      <th  id='table_compte5'  scope='col'>Montant ($)</th>
      <th id='table_compte7' scope='col'>Solde ($)</th>
    </tr>
  </thead><tbody>";
  
   foreach($results as $result)
{
echo "<tr id='tab_color'><td id='table_compte8'>".$result['date1']."</td><td id='table_compte9'>".$result['description']."</td><td id='table_compte10'>".$result['montant']."</td><td id='table_compte11'>".$result['solde']."</td></tr>";
}


echo "</tbody></tr></table>
</div>
</div>

<div id='bouton_compte'>

<button id='bouton_compte2' type='button' class='btn btn-success' data-toggle='modal' data-target='#E2_paiement'>Paiement</button>

<button id='bouton_compte3' type='button' class='btn btn-success' data-toggle='modal' data-target='#E2_Interac'>Virement Interac</button>
<button id='bouton_compte4' type='button' class='btn btn-success' data-toggle='modal' data-target='#E2_inter'>Virement inter-banque</button>
<button id='bouton_compte5' type='button' class='btn btn-danger' data-toggle='modal' data-target='#E2_supp'>Supprimer compte</button>
        
        </div>
 ";

$stmt->close();

         }
         
         ?>

</div>

<!--Fenêtre pour la suppresion du compte cheque+ --> 
<div id="E2_supp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Suppresion <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
        <br>
        <br>
        
        <div id="form_paiement21" class="col-12">
 <div class="form-group row">
     
     <label   class="col-sm-3 col-form-label">compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_e2_supp" name="compte" disabled value="<?php echo $no_compte_e2?>">
<br>
            </div>
            
             <label   class="col-sm-3 col-form-label">Solde  :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="solde_e2_supp" name="Solde" disabled value="<?php echo $solde_e2?>">
<br>
            </div>
            
             </div>
             </div>
        
        
        
         <?php
              
              $stmt = $conn->prepare("SELECT no_compte,type,description, solde FROM comptes WHERE no_membre = ? AND type != 'epargne+' ");
                $stmt->bind_param("s",$id);
  


$stmt->execute();
$results = $stmt->get_result();
if ($results->num_rows >= 1)
{
    echo 
    "
    <h5 class='supp'> Transférer votre solde de $solde_e2 $ à un autre de vos comptes <br> avant de supprimer votre compte </h5>
    <br>
    <br>
    <div class='supp'><strong>Sélectionner le compte désiré</strong></div>
    <br>
    
    ";
    foreach ($results as $result)
            {

 
                     echo"   <div id='supp' class='form-check'>
                        <input class='form-check-input' type='radio' name='ChoixCompte_e2'  value=".$result['no_compte']." checked>
                        <label class='form-check-label'> 
                        ".$result['type']." / ".$result['description']." / ".$result['solde']." $
                        </label>
                        </div>
                             ";
              }

}
else{
    echo 
    "
    <br>
    <br>
    <h2 class='supp'>Attention</h2>
    <h5 class='supp'>
    ceci est votre dernier compte avec nous. Cela veux dire que vous allez perdre votre solde de $solde_e2 $. </h5>
    ";
}




$stmt->close();
$conn->close();

        
                ?>
        <br>
        <br>
        
        
        

        
                    <button id='supp3' type="button" class="btn btn-danger" data-toggle="modal"  data-dismiss="modal" data-target="#supp_confirm_e2">Supprimer le compte</button>
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
           <br>
           <br>
          
          <small>Veuillez prendre note que lors de la suppresion tout information sera supprimé et aucune trace de l'existance de votre compte sera présente dans notre base de donnée ainsi que dans celle des caisses desjardins.
          À la banque route la sécurité des usagers présent, passé et futur est notre priorité et c'est pour cela que notre directrice de sécurité informatique est maintenant diplomé dans le cours de Pâtisserie avec une moyenne de 59%.</small>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>

<div class="modal fade" id="supp_confirm_e2" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment Supprimer le compte ? <br>
        Il sera impossible de revenir en arrière après la transaction.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_e2()">confirmer</button>
      </div>
    </div>
  </div>
</div>




<!--Fenêtre pour la création du compte cheque+-->
<div id="E2_creation_compte" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Création <br> de</h2>
        <h2 class="vert"> Compte</h2>
        </div>
        
         <div id="form_paiement12" class="col-12">
 <div class="form-group row">
     
     <label  for="no_membre_e2" class="col-sm-3 col-form-label">Membres :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_membre_e2" name="no_membre" disabled value="<?php echo $id?>">
<br>
            </div>

            <label  for="type_e2" class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="type_e2" name="type"  disabled value="epargne+">
<br>
            </div>
            
                 <label for="frais_e2" class="col-sm-3 col-form-label">Frais mensuel ($) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="frais_e2" name="frais" disabled value="0">
                <br>

            </div>
             
                 <label for="balance_min_e2" class="col-sm-3 col-form-label">Balance Min ($)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="balance_min_e2" name="balance_min" disabled value="1000">
                <br>

            </div>
            
              
                 <label for="interet_e2" class="col-sm-3 col-form-label">Intérêt (%)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="interet_e2" name="interet" disabled value="4">
                <br>

            </div>
           
                 <label for="description_e2" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" maxlength="25" class="form-control" id="description_e2" name="Description" placeholder="Description du compte">
                <br>

            </div>
            
            
            
            
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="creation_compte_e2()">Créer le compte</button>


  </div>




        </div>
        
        <br>
        <br>
      </div>
        
        
    </div>
  </div>
</div>


<!--Fenêtre pour les paiements du compte cheque+ -->
<div id="E2_paiement" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
      <div class="paiement">
          <br>
         <div class="paiement2">
         <h2 class="bleue">Paiement <br> de</h2>
        <h2 class="vert"> Facture</h2>
        </div>
        <br>
        <br>
        
         <div id="form_paiement10" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_p_e2" class="col-sm-3 col-form-label">Compte :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_compte_p_e2" name="compte" disabled value="<?php echo $no_compte_e2?>">
<br>
            </div>
                
                
            <label for="fournisseur_p_e2" class="col-sm-3 col-form-label">Fournisseur :</label>
            <div class="col-sm-9">
                <select class="form-control" id="fournisseur_p_e2">
                <option>Videotron S.E.N.C.</option>
                <option selected>Bell Canada Inc.</option>
                <option>Visa Scotia</option>
                <option>Visa Desjardins</option>
                <option>Mastercard BMO</option>
                </select>
<br>
            </div>
            
            
            
                 <label for="montant_p_e2" class="col-sm-3 col-form-label">Montant</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="montant_p_e2" onkeyup="montant_check_e2()" name="montant" placeholder="montant...">
                <small id="montanthelp_e2" class="erreur"></small>
                <br>

            </div>
           

            <button type="button" id="paiement_p_e2" class="btn btn-primary" data-dismiss="modal" onclick="Paiement_e2()">Envoyer le paiement</button>


  </div>




        </div>
        
      </div>
        
        
    </div>
  </div>
</div>

<!--Fenêtre pour les virements interax du compte cheque+-->
<div id="E2_Interac" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert"> interac</h2>
        </div>
        <br>
        <br>
        
       

<div id="form_paiement4" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_e2" class="col-sm-2 col-form-label">Compte :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_e2" name="compte" disabled value="<?php echo $no_compte_e2?>">
<br>
            </div>

            <label  for="courriel_e2" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="courriel_e2" onkeyup="ValidateEmail_e2()" name="Courriel" placeholder="L'adresse courriel du receveur">
                <small id="courrielhelp_v_e2" class="erreur"></small>
<br>
            </div>
            
                 <label for="question_e2" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="question_e2" name="Question" maxlength="25" placeholder="Question de sécurité...">
                <br>

            </div>
             
                 <label for="password_e2" class="col-sm-2 col-form-label">Reponse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password_e2" name="Réponse" maxlength="25" placeholder="Réponse de sécurité...">
                <br>

            </div>
            
              
                 <label for="montant_e2" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_e2" onkeyup="montant_check_v_e2()"  name="montant" placeholder="montant...">
                <small id="montanthelp_v_e2" class="erreur"></small>
                <br>

            </div>
           
                 <label for="telephone_e2" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telephone_e2" name="téléphone" maxlength="10" placeholder="Numéro de téléphone...">
                <br>

            </div>
            
              <div>
             
         </div>
             
        
            
            <button type="button" id="virement_i_e2" class="btn btn-primary" data-dismiss="modal" onclick="virement_interac_e2()">Envoyer le virement</button>


  </div>




        </div>
      </div>    
      <br>
      <br>
        
        
    </div>
  </div>
</div>

<!--Fenêtre pour les virement inter banque du compte cheque+-->
<div id="E2_inter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
      
      
    <div class="modal-content">
        
             <br>
      <div class="paiement">
          <br>
          <div class="paiement2">
         <h2 class="bleue">Virement</h2>
        <h2 class="vert">Inter-Banque</h2>
        </div>
        <br>
        <br>

<div id="form_paiement5" class="col-12">
 <div class="form-group row">
     
     <label  for="no_compte_e2_i" class="col-sm-2 col-form-label">De :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_compte_e2_i" name="compte" disabled value="<?php echo $no_compte_e2?>">
<br>
            </div>

        
            
                 <label for="CompteCible_e2" class="col-sm-2 col-form-label">Vers : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CompteCible_e2" onkeyup="compte_check_vi_e2()" name="CompteCible" placeholder="Compte Cible...">
                <small id="comptehelp_vi_e2" class="erreur"></small>
                <br>

            </div>
            
               <label for="Raison_e2" class="col-sm-2 col-form-label">Raison :  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Raison_e2"   maxlength="25" name="Raison" placeholder="Raison...">
                
                <br>

            </div>
            

                 <label for="montant_e2_i" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="montant_e2_i" pattern="/^-?\d*[.,]?\d{0,2}$/" onkeyup="montant_check_vi_e2()" data-decimal="2" name="montant" placeholder="montant...">
                <small id="montanthelp_vi_e2" class="erreur"></small>
                <br>

            </div>
           
            
            
            
            
            
            <button type="button" id="virement_vi_e2" class="btn btn-primary" data-dismiss="modal" onclick="virement_interB_e2()">Envoyer le virement</button>


  </div>




        </div>
      </div>    
      <br>
      <br>
        
        
    </div>
    
    
    
  </div>
</div>


       </div>
       </div>
       </div>
       
       
      
     
       <?php
         $servername = "localhost";
                $username = "tiestrie_andre";
                $password = "Canada01-";
                $dbname = "tiestrie_banqueroute";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                ?>
       
    <br>
       <br>
       <p id="bouton_historique">
<button id="bouton_historique2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#R_cheques">Historique des transactions(Chèques)</button>
<button id="bouton_historique3" type="button" class="btn btn-success" data-toggle="modal" data-target="#R_epargne">Historique des transactions(Épargne)</button>
<button id="bouton_historique4" type="button" class="btn btn-primary" data-toggle="modal" data-target="#R_cheques2">Historique des transactions(Chèques+)</button>
<button id="bouton_historique5" type="button" class="btn btn-success" data-toggle="modal" data-target="#R_epargne2">Historique des transactions(Épargne+)</button>
</p>


<!--Fenêtre pour les transactions du compte cheque -->
<div id="R_cheques" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
 <br>
        <br>
      <table id="cheque" class="display responsive no-wrap" style="width:95%">
        <thead>
            <tr>
                <th data-priority="1">Date</th>
                <th class="min-tablet-l">Numéro de transaction</th>
                <th class="min-tablet-l">Description</th>
                <th data-priority="2">Montant ($)</th>
                <th data-priority="3">Solde ($)</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
              $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS Date1,transactions.no_transaction, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ?");
                $stmt->bind_param("s",$no_compte_c);
  


$stmt->execute();
$results = $stmt->get_result();



foreach ($results as $result)
{
 echo "<tr><td> ".$result['Date1']." </td><td>".$result['no_transaction']."</td><td>".$result['description']."</td><td>".$result['montant']."</td><td>".$result['solde']."</td></tr>";
}
$stmt->close();

        ?>
        
        
    
            </tbody>
        </table>
        
        <br>
        <br>
        
        
        
    </div>
  </div>
</div>

<!--Fenêtre pour les transactions du compte epargne -->
<div id="R_epargne" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
  <br>
        <br>
      <table id="epargne" class="display responsive no-wrap" style="width:95%">
        <thead>
            <tr>
                <th data-priority="1">Date</th>
                <th class="min-tablet-l">Numéro de transaction</th>
                <th class="min-tablet-l">Description</th>
                <th data-priority="2">Montant ($)</th>
                <th data-priority="3">Solde ($)</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
              $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS Date1,transactions.no_transaction, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ?");
                $stmt->bind_param("s",$no_compte_e);
  


$stmt->execute();
$results = $stmt->get_result();



foreach ($results as $result)
{
 echo "<tr><td> ".$result['Date1']." </td><td>".$result['no_transaction']."</td><td>".$result['description']."</td><td>".$result['montant']."</td><td>".$result['solde']."</td></tr>";
}
$stmt->close();

        ?>
        
        
    
            </tbody>
        </table>
        
        <br>
        <br>
        
    </div>
  </div>
</div>

<!--Fenêtre pour les transactions du compte cheque+ -->
<div  id="R_cheques2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
       <br>
        <br>
      <table id="cheques2" class="display responsive no-wrap" style="width:95%">
        <thead>
            <tr>
                <th data-priority="1">Date</th>
                <th class="min-tablet-l">Numéro de transaction</th>
                <th class="min-tablet-l">Description</th>
                <th data-priority="2">Montant ($)</th>
                <th data-priority="3">Solde ($)</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
              $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS Date1,transactions.no_transaction, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ?");
                $stmt->bind_param("s",$no_compte_c2);
  


$stmt->execute();
$results = $stmt->get_result();



foreach ($results as $result)
{
 echo "<tr><td> ".$result['Date1']." </td><td>".$result['no_transaction']."</td><td>".$result['description']."</td><td>".$result['montant']."</td><td>".$result['solde']."</td></tr>";
}
$stmt->close();

        ?>
        
        
    
            </tbody>
        </table>
        
        <br>
        <br>

        
    </div>
  </div>
</div>

<!--Fenêtre pour les transactions du compte epargne+ -->
<div id="R_epargne2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
        
       <br>
        <br>
      <table id="epargne2" class="display responsive no-wrap" style="width:95%">
        <thead>
            <tr>
                <th data-priority="1">Date</th>
                <th class="min-tablet-l">Numéro de transaction</th>
                <th class="min-tablet-l">Description</th>
                <th data-priority="2">Montant ($)</th>
                <th data-priority="3">Solde ($)</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
              $stmt = $conn->prepare("SELECT DATE_FORMAT(transactions.timestamp, '%e %b %Y') AS Date1,transactions.no_transaction, transactions.description , transactions.montant, transactions.solde FROM transactions WHERE transactions.no_compte_debit = ?");
                $stmt->bind_param("s",$no_compte_e2);
  


$stmt->execute();
$results = $stmt->get_result();



foreach ($results as $result)
{
 echo "<tr><td> ".$result['Date1']." </td><td>".$result['no_transaction']."</td><td>".$result['description']."</td><td>".$result['montant']."</td><td>".$result['solde']."</td></tr>";
}
$stmt->close();
$conn->close();
        ?>
        
        
    
            </tbody>
        </table>
        
        <br>
        <br>
        
    </div>
  </div>
</div>



 <button id= "bouton_pret" class="btn btn-info" type="button" data-toggle="collapse" data-target="#pret" aria-expanded="false" aria-controls="pret">
   Calcul hypothécaire
  </button>


<div class="collapse" id="pret">
  <div class="card card-body">
    <div class="paiement3">
          <br>
         <div class="paiement2">
         <h2 class="bleue">"Faites nous confiance pour une maison et</h2>
        <h2 class="vert"> nous vous ferons confiance pour notre argent !"</h2>
        </div>
        <br>
        <br>
        
         <div id="form_paiement22" class="col-12">
 <div class="form-group row">
     

            
                <label  class="col-sm-3 col-form-label"> Montant du prêt:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="montant_pret" name="compte">
<br>

            </div>
                
                
                     <label  class="col-sm-3 col-form-label"> Taux annuel (%)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="taux_pret" name="Taux" disabled value="30">
<br>

            </div>
            
            
                <label  class="col-sm-3 col-form-label">Durée d'amortissement </label>
            <div class="col-sm-9">
                <select class="form-control" id="duree_pret">
                 <option value="12">1 an</option>
                 <option value="60">5 ans </option>
                 <option value="120">10 ans</option>
                 <option value="300">25 ans</option>
                 <option value="900" selected>75 ans</option>
             
                </select>
<br>
            </div>
            
                 <label  class="col-sm-3 col-form-label"> Paiement Mensuel  </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="reponse_pret" name="Taux" disabled>
<br>


            </div>
                

            
      
<br>
           <div> <button type="button"  class="btn btn-primary" data-dismiss="modal" onclick="pret()">Envoyer la demande</button>
           <br>
           <br>
           </div>
<br>

  </div>





        </div>
        
      </div>
      <br>

  </div>
</div>

 
     
     
       
    
      <footer id="footer" class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 id="liste_footer" class="font-weight-bold text-uppercase mt-3 mb-4">Particulier</h5>

          <ul class="list-unstyled">
            <li  class="liste_footer" >
                Comptes et services reliés
            </li>
            <li class="liste_footer">
              Cartes, prêts et marges de crédit
            </li>
            <li class="liste_footer">
              Épargne et placements
            </li>
            <li class="liste_footer">
              Avantages membre
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 id="liste_footer1" class="font-weight-bold text-uppercase mt-3 mb-4">Petite Entreprise</h5>

         <ul class="list-unstyled">
            <li  class="liste_footer" >
                Comptes et services reliés
            </li>
            <li class="liste_footer">
              Cartes, prêts et marges de crédit
            </li>
            <li class="liste_footer">
              Épargne et placements
            </li>
            <li class="liste_footer">
              Avantages membre
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 id="liste_footer3" class="font-weight-bold text-uppercase mt-3 mb-4">Grande Entreprise</h5>

         <ul class="list-unstyled">
            <li  class="liste_footer" >
                Comptes et services reliés
            </li>
            <li class="liste_footer">
              Cartes, prêts et marges de crédit
            </li>
            <li class="liste_footer">
              Épargne et placements
            </li>
            <li class="liste_footer">
              Avantages membre
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
           <h5 id="liste_footer4" class="font-weight-bold text-uppercase mt-3 mb-4">À propos de nous</h5>

         <ul class="list-unstyled">
            <li  class="liste_footer" >
                Comptes et services reliés
            </li>
            <li class="liste_footer">
              Cartes, prêts et marges de crédit
            </li>
            <li class="liste_footer">
              Épargne et placements
            </li>
            <li class="liste_footer">
              Avantages membre
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div id="liste_footer2" class="footer-copyright text-center py-3">© <?php echo date("Y") ?> Copyright: Lunettes3D Big corporation, Tous droits réservés
     
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



</body>
 

    
</html>