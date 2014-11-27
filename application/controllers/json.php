<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\Session;
use application\models\Tp_fiche_personne;
use application\models\Tp_membre;
use \Exception;

class Json extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		echo json_encode(array(false));
	}

	public function get_nbPage($arg)
	{
		if(isset($arg['0']) && is_numeric($arg['0'])){
			Session::set('nbPage', $arg['0']);
			die('true');
		}
		die('false');
	}

	public function post_login()
	{
		try {
			if (!isset($_POST["email"]) || !isset($_POST["password"]))
				throw new Exception('Champ non complet');

			if(!Tp_fiche_personne::connexion($_POST["email"], $_POST["password"]))
				throw new Exception('Erreur de connexion');

				\system\Session::setFlash("<strong>Info:</strong> Connexion réussi.", "success");
				$this->login = new Tp_fiche_personne(Session::get('id_perso'));
				$this->data['loged'] = true;
				$this->data['member'] = $this->login;

		}
		catch(Exception $e){
			\system\Session::setFlash('<strong>Erreur:</strong> '.$e->getMessage(), "danger");
		}

		\system\Router::redirect('accueil','action_index');
	}

	public function post_register()
	{
		try {
			if (!isset($_POST["password"]) || !isset($_POST["email"]))
				throw new Exception('Champ non complet');

			if(!Tp_fiche_personne::inscription('', '', '', $_POST["email"], $_POST["password"], '', '', '', '', ''))
				throw new Exception('Erreur d\'inscription');

			$fiche = new Tp_fiche_personne();
			$id_perso =$fiche->findFirst(array('fields' => 'id_perso','conditions'=> array('email'=> $_POST["email"])));
			$membre = new Tp_membre();
			$membre->insert(array('id_fiche_perso' => $id_perso->id_perso, 'id_abo' => 0, 'id_dernier_film' => 0, 'date_inscription' => date("Y-m-d H:i:s")));

			\system\Session::setFlash("<strong>Info:</strong> Félicitations pour ton isncription! Veillez à ne pas égarer vos identifiants.", "success");

		}
		catch(Exception $e){
			\system\Session::setFlash('<strong>Erreur:</strong>  '.$e->getMessage(), "danger");
		}

		\system\Router::redirect('accueil','action_index');
	}

	public function get_logout()
	{
		Tp_fiche_personne::deconnexion('membre');
		\system\Session::setFlash("<strong>Info:</strong> Déconnexion effectué.");
		\system\Router::redirect('accueil','action_index');
	}
}