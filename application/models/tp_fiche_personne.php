<?php
namespace application\models;
use system\Model;
use system\Session;
use system\helper\Input;
use \Exception;

class Tp_fiche_personne extends Model
{
	public $id_perso;
	public $nom;
	public $prenom;
	public $date_naissance;
	public $email;
	public $password;
	public $adresse;
	public $cpostal;
	public $ville;
	public $pays;
	public $statut;
	public $id_job;

	function __construct($id_perso = null)
	{
		parent::__construct();

		if(!is_null($id_perso))
		{
			// SELECT * FROM `tp_fiche_personne` left join tp_personnel on tp_fiche_personne.id_perso = tp_personnel.id_fiche_perso
			//$ligne = $this->findFirst(array('conditions'=> array('id_perso' => $id_perso), 'join' => array('tp_personnel' => 'tp_fiche_personne.id_perso = tp_personnel.id_fiche_perso')));

			$ligne = $this->select("SELECT a.*, b.id_job FROM tp_fiche_personne as a left join tp_personnel as b on a.id_perso = b.id_fiche_perso where id_perso = :id_perso", array(':id_perso' => $id_perso));
			$ligne = current($ligne);
			// Si ligne !== false le membre existe
			if($ligne !== FALSE)
			{
				$this->id_perso = $ligne->id_perso;
				$this->nom = $ligne->nom;
				$this->prenom = $ligne->prenom;
				$this->date_naissance = $ligne->date_naissance;
				$this->email = $ligne->email;
				$this->password = $ligne->password;
				$this->adresse = $ligne->adresse;
				$this->cpostal = $ligne->cpostal;
				$this->ville = $ligne->ville;
				$this->pays = $ligne->pays;
				$this->statut = $ligne->statut;
				$this->id_job = $ligne->id_job;

			}
		}
	}

	public static function inscription($nom, $prenom, $date_naissance, $email, $password, $adresse, $cpostal, $ville, $pays, $statut)
	{
		// Connexion sql
		$pdo = new Tp_fiche_personne();

		if(Input::inject(array($nom, $prenom, $date_naissance, $email, $password, $adresse, $cpostal, $ville, $pays, $statut)))
			throw new Exception('Carractères incorecte');

		if(strlen(trim($password)) < 4 || strlen(trim($password)) > 23)
			throw new Exception('Mot de passe trop cour');

		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			throw new Exception('Email invalide');

		if(self::emailDejaUtilise($email))
			throw new Exception('Email déjà utilisé');

		return $pdo->insert(array('nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $date_naissance, 'email' => $email, 'password' => $password, 'adresse' => $adresse, 'cpostal' => $cpostal, 'ville' => $ville, 'pays' => $pays, 'statut' => $statut));
	}

	public static function emailDejaUtilise($email)
	{
		// Connexion sql
		$pdo = new Tp_fiche_personne();

		$ligne = $pdo->findFirst(array('fields' => 'id_perso', 'conditions'=> array('email' => $email)));

		//Si il y a un résultat c'est que l'email est déjà utilisée
		//print_r($ligne);
		return ($ligne !== FALSE)? true: false;
	}

	public static function connexion($email, $password)
	{
		$retour = false;

		// Connexion sql
		$pdo = new Tp_fiche_personne();

		// Anti injection
		if(Input::inject(array($email, $password)))
			throw new Exception('INJECT');

		$ligne = $pdo->findFirst(array('fields' => 'id_perso', 'conditions'=> array('email' => $email, 'password' => $password)));

		//Si il y a un résultat c'est que l'utilisateur c'est bien connecté
		if($ligne !== FALSE)
		{
			Session::set('id_perso', $ligne->id_perso);
			$retour = true; //On retourne true pour dire que tout c'est bien passé
		}
		//Sinon c'est que le mot de passe ou le nom d'utilisateur n'est pas bon
		else
		{
			$retour = false;//Si c'est pas bon on renvoie false
		}
		return $retour;
	}

	public static function deconnexion(){
		Session::destroy();
		return (Session::get('id_perso') == false) ?  false : true;
	}

	public function sauvegarderLUtilisateur()
	{
		return $this->update(array('nom' => $this->nom, 'prenom' => $this->prenom, 'date_naissance' => $this->date_naissance, 'email' => $this->email, 'password' => $this->password, 'adresse' => $this->adresse, 'cpostal' => $this->cpostal, 'ville' => $this->ville, 'pays' => $this->pays, 'statut' => $this->statut), array('id_perso'=>$this->id_perso));
	}

	public static function supprimerLUtilisateur($id_perso)
	{
		$pdo = new Tp_fiche_personne();
		return $pdo->delete(array('id_perso'=>$id_perso));
	}

	public static function isLoged()
	{
		return isset($_SESSION['id_perso'])? true : false;
	}
}