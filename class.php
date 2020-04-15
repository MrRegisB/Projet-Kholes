<?php
  class Exercice
  	{
      private $idExercice;
  		private $titre;
  		private $dtAjout;
  		//Utilisateur qui a ajouté l'Exercice
  		private $idUtilisateur;
      private $idDifficulte;

  		public function __construct ($unTitre, $uneDtAjout, $unIdUtilisateur, $idDifficulte)
  		{
  			$this->titre=$unTitre;
  			$this->dtAjout=$uneDtAjout;
  			$this->idUtilisateur = $unIdUtilisateur;
  			$this->idDifficulte = $idDifficulte;
  		}
  		//Getters
      public function getIdExercice(){ return $this->idExercice; }
  		public function getTitre(){ return $this->titre; }
  		public function getDtAjout(){ return $this->dtAjout; }
  		public function getIdUtilisateur() { return $this->idUtilisateur; }
  		public function getIdDifficulte() { return $this->idDifficulte; }
  		//Setters
      public function setIdExercice($unIdExercice) { return $this->idExercice = $unIdExercice; }
  		public function setTitre($unTitre) { return $this->titre = $unTitre; }
  		public function setDtAjout($uneDtAjout) { return $this->dtAjout = $uneDtAjout; }
  		public function setIdUtilisateur($unIdUtilisateur) { $this->idUtilisateur = $unIdUtilisateur; }
  		public function setIdDifficulte($unIdDifficulte) { $this->idDifficulte = $unIdDifficulte; }

  	}
  class Utilisateur
    {
      private $idUtilisateur ;
      private $loginUtilisateur;
      private $mdpUtilisateur;

      public function __construct ($unLoginUtilisateur, $unMdpUtilisateur)
  		{
  			$this->loginUtilisateur = $unLoginUtilisateur;
  			$this->mdpUtilisateur = $unMdpUtilisateur;
  		}
      //Getters
  		public function getIdUtilisateur(){ return $this->idUtilisateur; }
  		public function getLogin(){ return $this->loginUtilisateur; }
  		public function getMdp() { return $this->mdpUtilisateur; }
  		//Setters
  		public function setTitre($unTitre) { return $this->titre = $unTitre; }
  		public function setDtAjout($uneDtAjout) { return $this->dtAjout = $uneDtAjout; }
  		public function setIdUtilisateur($unIdUtilisateur) { $this->idUtilisateur = $unIdUtilisateur; }
    }
  class NiveauEtude
  {
    private $idNiveau;
    private $nomNiveau;

    public function __construct ($unIdNiveau, $unNomNiveau)
    {
      $this->idNiveau=$unIdNiveau;
      $this->nomNiveau =$unNomNiveau;
    }
    //Getter
    public function getIdNiveau(){ return $this->idNiveau; }
    public function getNomNiveau(){ return $this->nomNiveau; }

  }
  class concerne
  {
    private $idExercice;
    private $idNiveauEtude;

    public function __construct($unIdExercice, $unIdNiveauEtude)
    {
      $this->idExercice=$idExercice;
      $this->idNiveauEtude =$idNiveauEtude;
    }
    //Getter
    public function getIdExercice(){ return $this->idExercice; }
    public function getIdNiveauEtude(){ return $this->idNiveauEtude; }
  }
?>
