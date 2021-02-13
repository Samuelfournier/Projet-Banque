 ////////////////////////////////////
        ////Suppresion des 4 comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
          
          
          
             function supp_c()
       {
           var compte = $('input[name=ChoixCompte]:checked').val();
           
           
           var no_compte = document.getElementById("no_compte_c_supp").value;
           var solde = document.getElementById("solde_c_supp").value;

           

           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           setTimeout("location.reload(true);",1000);
                document.getElementById("succes_message").innerHTML = "Compte supprimé  avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           
           setTimeout("location.reload(true);",1000);
    }
  };
        xhttp.open("POST", "http://localhost/banque/supp.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("no_compte="+no_compte+"&compte="+compte+"&solde="+solde);
           
           
         
       }
       
       
                function supp_c2()
       {
           var compte = $('input[name=ChoixCompte_c]:checked').val();
           
           
           var no_compte = document.getElementById("no_compte_c2_supp").value;
           var solde = document.getElementById("solde_c2_supp").value;

           

           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           setTimeout("location.reload(true);",1000);
                document.getElementById("succes_message").innerHTML = "Compte supprimé  avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           
           setTimeout("location.reload(true);",1000);
    }
  };
        xhttp.open("POST", "http://localhost/banque/supp.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("no_compte="+no_compte+"&compte="+compte+"&solde="+solde);
           
           
         
       }
       
       
       
       
       
               function supp_e()
       {
           var compte = $('input[name=ChoixCompte_e]:checked').val();
           
           
           var no_compte = document.getElementById("no_compte_e_supp").value;
           var solde = document.getElementById("solde_e_supp").value;

           

           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           setTimeout("location.reload(true);",1000);
                document.getElementById("succes_message").innerHTML = "Compte supprimé  avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           
           setTimeout("location.reload(true);",1000);
    }
  };
        xhttp.open("POST", "http://localhost/banque/supp.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("no_compte="+no_compte+"&compte="+compte+"&solde="+solde);
           
           
         
       }
       
       
                function supp_e2()
       {
           var compte = $('input[name=ChoixCompte_e2]:checked').val();
           
           
           var no_compte = document.getElementById("no_compte_e2_supp").value;
           var solde = document.getElementById("solde_e2_supp").value;

           

           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           setTimeout("location.reload(true);",1000);
                document.getElementById("succes_message").innerHTML = "Compte supprimé  avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           
           setTimeout("location.reload(true);",1000);
    }
  };
        xhttp.open("POST", "http://localhost/banque/supp.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("no_compte="+no_compte+"&compte="+compte+"&solde="+solde);
           
           
         
       }
       
          
       
       
       
       
       
        ////////////////////////////////////
        /////Restriction Formulaire pour Virement inter-banque(email)/////
         ////////////////////////////////////
          ////////////////////////////////////
          
 
 
          
       function ValidateEmail_c(mail) 

{
    
    var emailAddr = document.getElementById("courriel");
    
    
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddr.value))
        {
        document.getElementById("virement_i_c").disabled = false;
	    document.getElementById("courrielhelp_v_c").innerHTML = "";
        }
        else
        {
            document.getElementById("virement_i_c").disabled = true;
	        document.getElementById("courrielhelp_v_c").innerHTML = "Entrer un courriel valide !";
        }
}
          
          
          
          
                          function ValidateEmail_e(mail) 

{
    
    var emailAddr = document.getElementById("courriel_e");
    
    
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddr.value))
        {
        document.getElementById("virement_i_e").disabled = false;
	    document.getElementById("courrielhelp_v_e").innerHTML = "";
        }
        else
        {
            document.getElementById("virement_i_e").disabled = true;
	        document.getElementById("courrielhelp_v_e").innerHTML = "Entrer un courriel valide !";
        }
}
          
          
          
          
          
                function ValidateEmail_c2(mail) 

{
    
    var emailAddr = document.getElementById("courriel_c");
    
    
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddr.value))
        {
        document.getElementById("virement_i_c2").disabled = false;
	    document.getElementById("courrielhelp_v_c2").innerHTML = "";
        }
        else
        {
            document.getElementById("virement_i_c2").disabled = true;
	        document.getElementById("courrielhelp_v_c2").innerHTML = "Entrer un courriel valide !";
        }
}
          
       
       
       function ValidateEmail_e2(mail) 

{
    
    var emailAddr = document.getElementById("courriel_e2");
    
    
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddr.value))
        {
        document.getElementById("virement_i_e2").disabled = false;
	    document.getElementById("courrielhelp_v_e2").innerHTML = "";
        }
        else
        {
            document.getElementById("virement_i_e2").disabled = true;
	        document.getElementById("courrielhelp_v_e2").innerHTML = "Entrer un courriel valide !";
        }
}


       
        ////////////////////////////////////
        /////Restriction Formulaire pour Virement inter-banque/////
         ////////////////////////////////////
          ////////////////////////////////////
          
          function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}

setInputFilter(document.getElementById("montant_c_i"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
 
  
  setInputFilter(document.getElementById("Raison_c"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  setInputFilter(document.getElementById("CompteCible_c"), function(value) {
  return /^\d*$/.test(value); });
   

setInputFilter(document.getElementById("montant_e_i"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("Raison_e"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
   setInputFilter(document.getElementById("CompteCible_e"), function(value) {
  return /^\d*$/.test(value); });

setInputFilter(document.getElementById("montant_c2_i"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("Raison_c2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  setInputFilter(document.getElementById("CompteCible_c2"), function(value) {
  return /^\d*$/.test(value); });
  
  
  
  
  
  



setInputFilter(document.getElementById("montant_e2_i"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("Raison_e2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  setInputFilter(document.getElementById("CompteCible_e2"), function(value) {
  return /^\d*$/.test(value); });
  
  
  
  
  
  
        ////////////////////////////////////
        /////Restriction Formulaire pour Virement interac/////
        ////////////////////////////////////
        ////////////////////////////////////
        
        // cheque///
        
       
  
 
  
  setInputFilter(document.getElementById("question_e"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
 setInputFilter(document.getElementById("password_e"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  
   setInputFilter(document.getElementById("montant_e"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("telephone_e"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
        
        
        // epargne///
        
        
         setInputFilter(document.getElementById("question"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
   setInputFilter(document.getElementById("password"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  
   setInputFilter(document.getElementById("montant"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("telephone"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
          

          // cheque+///
          
          
          setInputFilter(document.getElementById("question_c"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
 
  
  setInputFilter(document.getElementById("password_c"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  
   setInputFilter(document.getElementById("montant_c"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("telephone_c"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  
   // eparnge+///
          
          
          setInputFilter(document.getElementById("question_e2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  setInputFilter(document.getElementById("password_e2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  
   setInputFilter(document.getElementById("montant_e2"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("telephone_e2"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  
  ////////////////////////////////////
        /////Restriction Formulaire pour Paiement/////
        ////////////////////////////////////
        ////////////////////////////////////
        
        setInputFilter(document.getElementById("montant_p_c"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("montant_p_e"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("montant_p_c2"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  setInputFilter(document.getElementById("montant_p_e2"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
  
  
  
  ////////////////////////////////////
        /////Restriction Formulaire pour création de compte/////
        ////////////////////////////////////
        ////////////////////////////////////
        
        
  setInputFilter(document.getElementById("description"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
   setInputFilter(document.getElementById("description_e"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
   setInputFilter(document.getElementById("description_c2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
   setInputFilter(document.getElementById("description_e2"), function(value) {
  return /^[a-z \u00c0-\u024f]*$/i.test(value); });
  
  
  
       
       
       ////////////////////////////////////
        /////check compte existant des transaction interbanque/////
         ////////////////////////////////////
          ////////////////////////////////////
          
          function compte_check_vi_c()
{
           
    var compte = document.getElementById("CompteCible_c").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var compteCible =	this.responseText;
         
       
        
        if (compteCible == "introuvable")
        {
			document.getElementById("virement_vi_c").disabled = true;
			document.getElementById("comptehelp_vi_c").innerHTML = "Compte introuvable";
        }
		else 
		{
			document.getElementById("virement_vi_c").disabled = false;
			document.getElementById("comptehelp_vi_c").innerHTML = "";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/compte.php?compte="+compte, true);
        xhttp.send();
       
}
          
          
          
          
          
                               function compte_check_vi_e()
{
           
    var compte = document.getElementById("CompteCible_e").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var compteCible =	this.responseText;
         
       
        
        if (compteCible == "introuvable")
        {
			document.getElementById("virement_vi_e").disabled = true;
			document.getElementById("comptehelp_vi_e").innerHTML = "Compte introuvable";
        }
		else 
		{
			document.getElementById("virement_vi_e").disabled = false;
			document.getElementById("comptehelp_vi_e").innerHTML = "";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/compte.php?compte="+compte, true);
        xhttp.send();
       
}
          
          
          
                               function compte_check_vi_c2()
{
           
    var compte = document.getElementById("CompteCible_c2").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var compteCible =	this.responseText;
         
       
        
        if (compteCible == "introuvable")
        {
			document.getElementById("virement_vi_c2").disabled = true;
			document.getElementById("comptehelp_vi_c2").innerHTML = "Compte introuvable";
        }
		else 
		{
			document.getElementById("virement_vi_c2").disabled = false;
			document.getElementById("comptehelp_vi_c2").innerHTML = "";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/compte.php?compte="+compte, true);
        xhttp.send();
       
}
          
          
          
          
                     function compte_check_vi_e2()
{
           
    var compte = document.getElementById("CompteCible_e2").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var compteCible =	this.responseText;
         
       
        
        if (compteCible == "introuvable")
        {
			document.getElementById("virement_vi_e2").disabled = true;
			document.getElementById("comptehelp_vi_e2").innerHTML = "Compte introuvable";
        }
		else 
		{
			document.getElementById("virement_vi_e2").disabled = false;
			document.getElementById("comptehelp_vi_e2").innerHTML = "";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/compte.php?compte="+compte, true);
        xhttp.send();
       
}
          
          
       
       
       
       ////////////////////////////////////
        /////check montant des transaction des comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
          
          
          ////////////////////////////////////
        /////check montant des transaction des comptes(Paiement)/////
        ////////////////////////////////////
          ////////////////////////////////////
           function montant_check_c()
{
           
    var compte = document.getElementById("no_compte_p_c").value;
    var montant_e2 = document.getElementById("montant_p_c").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         
        
        
        if (montant_e2 <= solde)
        {
			document.getElementById("paiement_p_c").disabled = false;
			document.getElementById("montanthelp_c").innerHTML = "";
        }
		else 
		{
			document.getElementById("paiement_p_c").disabled = true;
			document.getElementById("montanthelp_c").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
           function montant_check_e()
{
           
    var compte = document.getElementById("no_compte_p_e").value;

    var montant_e2 = document.getElementById("montant_p_e").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         
        
        
        if (montant_e2 <= solde)
        {
			document.getElementById("paiement_p_e").disabled = false;
			document.getElementById("montanthelp_e").innerHTML = "";
        }
		else 
		{
			document.getElementById("paiement_p_e").disabled = true;
			document.getElementById("montanthelp_e").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
          
          
          function montant_check_c2()
{
           
    var compte = document.getElementById("no_compte_p_c2").value;

    var montant_e2 = document.getElementById("montant_p_c2").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         console.log(solde);
   
        
        if (montant_e2 <= solde)
        {
			document.getElementById("paiement_p_c2").disabled = false;
			document.getElementById("montanthelp_c2").innerHTML = "";
        }
		else 
		{
			document.getElementById("paiement_p_c2").disabled = true;
			document.getElementById("montanthelp_c2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
       
       
       
       function montant_check_e2()
{
           
    var compte = document.getElementById("no_compte_p_e2").value;

    var montant_e2 = document.getElementById("montant_p_e2").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         
       
        
        if (montant_e2 <= solde)
        {
			document.getElementById("paiement_p_e2").disabled = false;
			document.getElementById("montanthelp_e2").innerHTML = "";
        }
		else 
		{
			document.getElementById("paiement_p_e2").disabled = true;
			document.getElementById("montanthelp_e2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
       
       
       ////////////////////////////////////
        /////check montant des transaction des comptes(Virement Interac)/////
        ////////////////////////////////////
          ////////////////////////////////////
           function montant_check_v_c()
{
           
    var compte = document.getElementById("no_compte").value;

    var montant = document.getElementById("montant").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_i_c").disabled = false;
			document.getElementById("montanthelp_v_c").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_i_c").disabled = true;
			document.getElementById("montanthelp_v_c").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
          
       function montant_check_v_e()
{
           
    var compte = document.getElementById("no_compte_e").value;

    var montant = document.getElementById("montant_e").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_i_e").disabled = false;
			document.getElementById("montanthelp_v_e").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_i_e").disabled = true;
			document.getElementById("montanthelp_v_e").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
       
       
       
       function montant_check_v_c2()
{
           
    var compte = document.getElementById("no_compte_c").value;

    var montant = document.getElementById("montant_c").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_i_c2").disabled = false;
			document.getElementById("montanthelp_v_c2").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_i_c2").disabled = true;
			document.getElementById("montanthelp_v_c2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}



       
             function montant_check_v_e2()
{
           
    var compte = document.getElementById("no_compte_e2").value;

    var montant = document.getElementById("montant_e2").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde =	JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_i_e2").disabled = false;
			document.getElementById("montanthelp_v_e2").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_i_e2").disabled = true;
			document.getElementById("montanthelp_v_e2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
       
       
       ////////////////////////////////////
        /////check montant des transaction des comptes(Virement Inter-Banques)/////
        ////////////////////////////////////
          ////////////////////////////////////
          
          
                                      function montant_check_vi_c()
{
           
    var compte = document.getElementById("no_compte_c_i").value;

    var montant = document.getElementById("montant_c_i").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_vi_c").disabled = false;
			document.getElementById("montanthelp_vi_c").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_vi_c").disabled = true;
			document.getElementById("montanthelp_vi_c").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
                            function montant_check_vi_e()
{
           
    var compte = document.getElementById("no_compte_e_i").value;

    var montant = document.getElementById("montant_e_i").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_vi_e").disabled = false;
			document.getElementById("montanthelp_vi_e").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_vi_e").disabled = true;
			document.getElementById("montanthelp_vi_e").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
                            function montant_check_vi_c2()
{
           
    var compte = document.getElementById("no_compte_c2_i").value;

    var montant = document.getElementById("montant_c2_i").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_vi_c2").disabled = false;
			document.getElementById("montanthelp_vi_c2").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_vi_c2").disabled = true;
			document.getElementById("montanthelp_vi_c2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}
          
          
          
          
       
                  function montant_check_vi_e2()
{
           
    var compte = document.getElementById("no_compte_e2_i").value;

    var montant = document.getElementById("montant_e2_i").value;
       
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
         
          var solde = JSON.parse(this.responseText) -2;
         
        
        if (montant <= solde)
        {
			document.getElementById("virement_vi_e2").disabled = false;
			document.getElementById("montanthelp_vi_e2").innerHTML = "";
        }
		else 
		{
			document.getElementById("virement_vi_e2").disabled = true;
			document.getElementById("montanthelp_vi_e2").innerHTML = "Montant supérieur au solde avec les frais de services de 2$";
        }

          }
          
          
        };
        xhttp.open("GET", "http://localhost/banque/solde.php?compte="+compte, true);
        xhttp.send();
        
}




       
       
       
       
        ////////////////////////////////////
        /////creation  des 4 comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
       
       function creation_compte_c()
       {
           var membres = document.getElementById("no_membre").value;
           var type = document.getElementById("type").value;
           var frais = document.getElementById("frais").value;
           var balance = document.getElementById("balance_min").value;
           var interet = document.getElementById("interet").value;
           var description = document.getElementById("description").value;
           
           
           var description2= description.trim();
if(_.isEmpty(description2)){
 description = "Chèques"
}
           
           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           location.reload(true);
    }
  };
      xhttp.open("POST", "http://localhost/banque/creation_compte.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("membres="+membres+"&type="+type+"&frais="+frais+"&balance="+balance+"&interet="+interet+"&description="+description);
           
           
         
       }
       
       
       
       
       function creation_compte_e()
       {
           var membres = document.getElementById("no_membre_e").value;
           var type = document.getElementById("type_e").value;
           var frais = document.getElementById("frais_e").value;
           var balance = document.getElementById("balance_min_e").value;
           var interet = document.getElementById("interet_e").value;
           var description = document.getElementById("description_e").value;
           
            var description2= description.trim();
if(_.isEmpty(description2)){
 description = "Épargne"
}
           
           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {

           location.reload(true);
    }
  };
      xhttp.open("POST", "http://localhost/banque/creation_compte.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("membres="+membres+"&type="+type+"&frais="+frais+"&balance="+balance+"&interet="+interet+"&description="+description);
           
           
         
       }
       
       
       
       function creation_compte_c2()
       {
           var membres = document.getElementById("no_membre_c2").value;
           var type = document.getElementById("type_c2").value;
           var frais = document.getElementById("frais_c2").value;
           var balance = document.getElementById("balance_min_c2").value;
           var interet = document.getElementById("interet_c2").value;
           var description = document.getElementById("description_c2").value;
           var type2 = encodeURIComponent(type);
           
            var description2= description.trim();
if(_.isEmpty(description2)){
 description = "Chèques plus"
}
          
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           location.reload(true);
    }
  };
      xhttp.open("POST", "http://localhost/banque/creation_compte.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("membres="+membres+"&type="+type2+"&frais="+frais+"&balance="+balance+"&interet="+interet+"&description="+description);
           
          
         
       }
       
       
       
        function creation_compte_e2()
       {
           var membres = document.getElementById("no_membre_e2").value;
           var type = document.getElementById("type_e2").value;
           var frais = document.getElementById("frais_e2").value;
           var balance = document.getElementById("balance_min_e2").value;
           var interet = document.getElementById("interet_e2").value;
           var description = document.getElementById("description_e2").value;
           var type2 = encodeURIComponent(type);
           
            var description2= description.trim();
if(_.isEmpty(description2)){
 description = "Épargne plus"
}
           
            var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
          location.reload(true);
    }
  };
      xhttp.open("POST", "http://localhost/banque/creation_compte.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("membres="+membres+"&type="+type2+"&frais="+frais+"&balance="+balance+"&interet="+interet+"&description="+description);
           
           
         
       }
        ////////////////////////////////////
        /////Paiement  des 4 comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
       
       
       function Paiement_c()
      {
          
       var compte = document.getElementById("no_compte_p_c").value;
       var montant = document.getElementById("montant_p_c").value;
       var fournisseur = document.getElementById("fournisseur_p_c").value;


       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           var response = JSON.parse(this.responseText).code;

           
           if(response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Paiement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
               

      
    }
  };
      xhttp.open("POST", "http://localhost/banque/paiement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&montant="+montant+"&fournisseur="+fournisseur);



      }
      
      
       function Paiement_e()
      {
          
       var compte = document.getElementById("no_compte_p_e").value;
       var montant = document.getElementById("montant_p_e").value;
       var fournisseur = document.getElementById("fournisseur_p_e").value;


       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         var response = JSON.parse(this.responseText).code;

           
           if(response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Paiement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
    }
  };
      xhttp.open("POST", "http://localhost/banque/paiement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&montant="+montant+"&fournisseur="+fournisseur);



      }
       
       
       function Paiement_c2()
      {
          
       var compte = document.getElementById("no_compte_p_c2").value;
       var montant = document.getElementById("montant_p_c2").value;
       var fournisseur = document.getElementById("fournisseur_p_c2").value;


       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
          var response = JSON.parse(this.responseText).code;

           
           if(response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Paiement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
           
    }
  };
      xhttp.open("POST", "http://localhost/banque/paiement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&montant="+montant+"&fournisseur="+fournisseur);



      }
      
      
      
      
       function Paiement_e2()
      {
          
       var compte = document.getElementById("no_compte_p_e2").value;
       var montant = document.getElementById("montant_p_e2").value;
       var fournisseur = document.getElementById("fournisseur_p_e2").value;


       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
          var response = JSON.parse(this.responseText).code;

           
           if(response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Paiement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
      
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/paiement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&montant="+montant+"&fournisseur="+fournisseur);



      }
       
       ////////////////////////////////////
        /////Restriction sur la raison !/////
         ////////////////////////////////////
          ////////////////////////////////////
          
          
        
       
       
         ////////////////////////////////////
        /////Virement Inter-Banque des 4 comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
          function virement_interB_c()
      {
          
       var compte = document.getElementById("no_compte_c_i").value;
       var cible = document.getElementById("CompteCible_c").value;
       var raison = document.getElementById("Raison_c").value.trim();
       var montant = document.getElementById("montant_c_i").value;
       
var raison2= raison.trim();
if(_.isEmpty(raison2)){
 raison = "Aucune raison"
}

       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           var response = this.responseText;
           
        if(response == "succes"){
           setTimeout("location.reload(true);",2000);
       document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

      setTimeout(function(){
      document.getElementById("succes_message").innerHTML = '';
      }, 2000);
      
        }
        else{
            
            document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
        
            
        }
      
      

      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement_inter.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&cible="+cible+"&raison="+raison+"&montant="+montant);



      }
          
          
          
          
          
            function virement_interB_e()
      {
          
       var compte = document.getElementById("no_compte_e_i").value;
       var cible = document.getElementById("CompteCible_e").value;
       var raison = document.getElementById("Raison_e").value;
       var montant = document.getElementById("montant_e_i").value;

var raison2= raison.trim();
if(_.isEmpty(raison2)){
 raison = "Aucune raison"
}
       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
              var response = this.responseText;
           
        if(response == "succes"){
           setTimeout("location.reload(true);",2000);
       document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

      setTimeout(function(){
      document.getElementById("succes_message").innerHTML = '';
      }, 2000);
      
        }
        else{
            
            document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
        
            
        }
      
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement_inter.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&cible="+cible+"&raison="+raison+"&montant="+montant);



      }
          
          
          
            function virement_interB_c2()
      {
          
       var compte = document.getElementById("no_compte_c2_i").value;
       var cible = document.getElementById("CompteCible_c2").value;
       var raison = document.getElementById("Raison_c2").value;
       var montant = document.getElementById("montant_c2_i").value;


var raison2= raison.trim();
if(_.isEmpty(raison2)){
 raison = "Aucune raison"
}

       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
             var response = this.responseText;
           
        if(response == "succes"){
           setTimeout("location.reload(true);",2000);
       document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

      setTimeout(function(){
      document.getElementById("succes_message").innerHTML = '';
      }, 2000);
      
        }
        else{
            
            document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
        
            
        }
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement_inter.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&cible="+cible+"&raison="+raison+"&montant="+montant);



      }
          
          
          
       
        function virement_interB_e2()
      {
          
       var compte = document.getElementById("no_compte_e2_i").value;
       var cible = document.getElementById("CompteCible_e2").value;
       var raison = document.getElementById("Raison_e2").value;
       var montant = document.getElementById("montant_e2_i").value;


       var raison2= raison.trim();
if(_.isEmpty(raison2)){
 raison = "Aucune raison"
}

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
               var response = this.responseText;
           
        if(response == "succes"){
           setTimeout("location.reload(true);",2000);
       document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

      setTimeout(function(){
      document.getElementById("succes_message").innerHTML = '';
      }, 2000);
      
        }
        else{
            
            document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
        
            
        }
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement_inter.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&cible="+cible+"&raison="+raison+"&montant="+montant);



      }
       
       
       
       
       
       ////////////////////////////////////
        /////Virement Interac des 4 comptes/////
         ////////////////////////////////////
          ////////////////////////////////////
       
      function virement_interac_c()
      {
          
       var compte = document.getElementById("no_compte").value;
       var email = document.getElementById("courriel").value;
       var question = document.getElementById("question").value;
       var reponse = document.getElementById("password").value;
       var montant = document.getElementById("montant").value;
       var telephone = document.getElementById("telephone").value;



       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           
           var reponse2 = JSON.parse(this.responseText);
           var response = JSON.parse(this.responseText).code;
      
 

           if(reponse2 == "fail" || response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&email="+email+"&question="+question+"&reponse="+reponse+"&montant="+montant+"&telephone="+telephone);


         
      }
      
      
      
       function virement_interac_c2()
      {
          
       var compte = document.getElementById("no_compte_c").value;
       var email = document.getElementById("courriel_c").value;
       var question = document.getElementById("question_c").value;
       var reponse = document.getElementById("password_c").value;
       var montant = document.getElementById("montant_c").value;
       var telephone = document.getElementById("telephone_c").value;
       
      
       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           
           
         var reponse2 = JSON.parse(this.responseText);
           var response = JSON.parse(this.responseText).code;
      
 

           if(reponse2 == "fail" || response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&email="+email+"&question="+question+"&reponse="+reponse+"&montant="+montant+"&telephone="+telephone);


         
      }
      
      
      
       function virement_interac_e()
      {
          
       var compte = document.getElementById("no_compte_e").value;
       var email = document.getElementById("courriel_e").value;
       var question = document.getElementById("question_e").value;
       var reponse = document.getElementById("password_e").value;
       var montant = document.getElementById("montant_e").value;
       var telephone = document.getElementById("telephone_e").value;
       

       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           
         var reponse2 = JSON.parse(this.responseText);
           var response = JSON.parse(this.responseText).code;
      
 

           if(reponse2 == "fail" || response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
      
    }
    
  };
      xhttp.open("POST", "http://localhost/banque/virement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&email="+email+"&question="+question+"&reponse="+reponse+"&montant="+montant+"&telephone="+telephone);


         
      }
      
      
      function virement_interac_e2()
      {
          
       var compte = document.getElementById("no_compte_e2").value;
       var email = document.getElementById("courriel_e2").value;
       var question = document.getElementById("question_e2").value;
       var reponse = document.getElementById("password_e2").value;
       var montant = document.getElementById("montant_e2").value;
       var telephone = document.getElementById("telephone_e2").value;
       
 
       

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
          var reponse2 = JSON.parse(this.responseText);
           var response = JSON.parse(this.responseText).code;
      
 

           if(reponse2 == "fail" || response == 500){
               
               document.getElementById("fail_message").innerHTML = "Une erreur est survenue, veuillez réessayer.";
               
                setTimeout(function(){
                document.getElementById("fail_message").innerHTML = '';
                }, 2000);
               
           }
           else
           {
               setTimeout("location.reload(true);",2000);
                document.getElementById("succes_message").innerHTML = "Virement envoyé avec succès";

                setTimeout(function(){
                document.getElementById("succes_message").innerHTML = '';
                }, 2000);
           }
      
    }
  };
      xhttp.open("POST", "http://localhost/banque/virement.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("compte="+compte+"&email="+email+"&question="+question+"&reponse="+reponse+"&montant="+montant+"&telephone="+telephone);


         
      }
      
      
      
      
      
      ///////////////pret maison////////////
      ////////////////////////////////////
      ////////////////////////////////////
      ////////////////////////////////////
      
      
         function pret()
          {
             var amount = document.getElementById("montant_pret").value;
             var rate = 30;
             var duration = document.getElementById("duree_pret").value;
             
        
             
             var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           
           var reponse = JSON.parse(this.responseText).payment;
            document.getElementById("reponse_pret").value = reponse;
            
    }
  };
        xhttp.open("POST", "https://api.interax.ca/interet.json", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("amount="+amount+"&rate="+rate+"&duration="+duration);
           
             
              
          }
          
          