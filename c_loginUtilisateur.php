<?php
  session_start();
  include("../../constantes.php");
  include("../../Lib/fonctions.php");
  include("../../Modules/class.php");
  
  if (isset($_POST['valid']))
  {
    include("m_utilisateurs.php");
    $utilisateur = new Utilisateur($_POST['login'], $_POST['motDePasse']);
    $resUser = selectUtilisateur($_POST['login'], $_POST['motDePasse']);
    if ($row = $resUser->fetch()) {
			$_SESSION['idUtilisateur'] = $row['idUtilisateur'];
      Header("Location:../../index.php");
		}
    else {
      echo "Combo login/mdp faux veuillez recommencer";
      include("v_loginUtilisateur_form.php");
    }

  }
  else
  {
    include("v_loginUtilisateur_form.php");
  }
?>
