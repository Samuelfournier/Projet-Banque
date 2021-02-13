<? session_start(); ?>
<? session_unset($_SESSION["id"]); ?>
<? session_destroy(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Banqueroute accueil</title>
</head>

<body>

<!--Barrre de navigation -->
<header>
<nav class="navbar navbar-expand-md navbar-light bg-dark">
<div class="container-fluid">

<a id="particuliers" class="navbar-brand" href="#">  <img alt="logo officiel" src="https://i.ibb.co/vBWtY84/Logo-official.png" height="50" ></a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarResponsive">

<ul  id="first_menu"  class="navbar-nav ">

<li class="nav-item">

 <a class="first_menu" href="#"> Particuliers </a>
 </li>

<li class="nav-item">

 <a class="first_menu" href="#"> Petite Entreprise </a>
 </li>
 <li class="nav-item">
  <a class="first_menu" href="#"> Grande entreprise </a>

</li>

</ul>

<ul class="navbar-nav ml-auto">

<li class="nav-item">
 <a class="first_menu" href="form_compte.php"><i class="fas fa-user"></i> S'inscrire</a>
 </li>
 <li class="nav-item">
  <a class="first_menu" href="form_connect.php"><i class="fas fa-sign-in-alt"></i> Connection</a>

</li>

</ul>

</div>

</div>



</nav>


</header>


<!-- Carrousel avec les 3 images -->
<div id="id" class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div  class="carousel-item active">
        <img src="https://i.ibb.co/WpYq2Nv/Banque-route3-1.jpg" class="d-block w-100" alt="slider_1" height="500">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text_img">Simples. Numériques. Mobiles.</h5>
          <p class="text_img">Nos services bancaires facilitent vos finances.</p>
        </div>
      </div>
      <div  class="carousel-item">
        <img src="https://i.ibb.co/nckGYf1/Banque-route5-1.jpg" class="d-block w-100" alt="Slider_2"  height="500">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text_img">Fait du jour avec la Banqueroute  ! </h5>
          <p class="text_img">Saviez vous que pour 1$ canadien vous recevez 0.68 EUR.</p>
        </div>
      </div>
      <div  class="carousel-item">
        <img src="https://i.ibb.co/wMtrRbK/Banque-route6-1.jpg" class="d-block w-100" alt="slider_3" height="500">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text_img">Un petit tir au poignet ?</h5>
          <p class="text_img">Tu gagnes au tir au poignet contre le PDG et tu reçois 49.9% de la compagnie. </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<!-- Millieu de page -->
<br>
<br>
<div id="container" class="container">
  <div class="row">
    <div  class="col-12">
	<br>
      <img src="https://i.ibb.co/wztLbbX/maybe.png" alt="foule" id="img_des">
    </div>
  </div>
    <div class="row">
    <div class="col-12">
	<br>
	<br>
      <h1 class="text_content">Devenez membre de la Banque Route et profitez des services financiers et des conseils de la 1<sup>re</sup> Banque du Monde</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
	<br>
	<br>
      <h4 class="text_content">Je veux ouvrir un compte <br>
et devenir membre</h4> 
    </div>
  </div>
  
   <div class="row">
    <div id="text_content" class="col-12">
	<br>
	<br>
     <a  href="form_compte.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Particulier</a>
<a href="#text_content" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Entreprise</a>
    </div>
  </div>
  
  
     <div class="row">
    <div id="text_content1" class="col-12">
	<br>
	<br>
    <h3> Nous choisir <br> c'est avoir un impact significatif dans la vie <br> 
	des gens et des communautés</h3>
	<br>
	<br>
	<br>
	<br>
    </div>
  </div>
  
    <div id="text_content2" class="row">
    <div id="content_1" class="col-sm">
      <h2> 17.3 Milliards</h2> 
	  de clients
	  <br>
	<br>
	<br>
	<br>
    </div>
	
    <div id="content_2" class="col-sm">
      <h2> Banque #1 au monde</h2> 
	  Choisis par le PDG de Banque Route
	  <br>
	<br>
	<br>
	<br>
    </div>
	
    <div class="col-sm">
      <h2> Aucun Service</h2> 
	  Aucun service à la clientèle disponible
	  <br>
	<br>
	<br>
	<br>
    </div>
	
  </div>
  
</div>

<!-- Footer -->
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>