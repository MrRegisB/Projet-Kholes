<?php
	session_start();
	include("constantes.php");
	include(CHEMIN_LIBRARY."fonctions.php");
	include(CHEMIN_MODULE."class.php");
	include(CHEMIN_GLOBAL."head.htm");
	include(CHEMIN_GLOBAL."menu.htm");

	if (!isset($_SESSION['idUtilisateur'])){
		Header("Location:".CHEMIN_MODULE_UTILISATEURS."c_loginUtilisateur.php");
	}
?>

<div align="center">
	<?php
		if(isset($_GET['page'])){
			switch($_GET['page']){
				case "ajoutExercice" :
					include(CHEMIN_MODULE_EXERCICES."c_ajouterExercice.php");
				break;
				case "consultExercice" :
					include(CHEMIN_MODULE_EXERCICES."c_consulterExercices.php");
				break;
				case "modifExercice" :
					include(CHEMIN_MODULE_EXERCICES."c_modifExercice.php");
				break;
				case "deconnexion" :
					include(CHEMIN_MODULE_UTILISATEURS."c_deconnexion.php");
				break;
				/*
				case "consulterCategorie" :
					include(CHEMIN_MODULE_CATEGORIE."c_consulterCategories.php");
				break;*/
			}
		}
		session_write_close();
	?>
</div>
<?php include(CHEMIN_GLOBAL."bottom.htm"); ?>
