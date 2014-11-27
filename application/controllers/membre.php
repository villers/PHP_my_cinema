<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\helper\Pagination;
use application\models\Tp_Membre;
use application\models\Tp_fiche_personne;
use \Exception;

class Membre extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		$membre = new Tp_membre();

		$post_search = (isset($_GET['search']))? $_GET['search'] : '%';

		$search = "";
		$count = 0;
		if(isset($_GET['search'])){

			$search .= " where c.nom like :search or prenom like :search or email like :search or ville like :search";
			$stmt = $membre->select("SELECT count(*) as count FROM tp_membre as a left join tp_abonnement as b on a.id_abo = b.id_abo left join tp_fiche_personne as c on a.id_fiche_perso = c.id_perso $search", array(':search' => '%' . $post_search . '%'));
			$count = $stmt[0]->count;

		}else{
			$stmt = $membre->select("SELECT count(*) as count FROM tp_membre as a left join tp_abonnement as b on a.id_abo = b.id_abo left join tp_fiche_personne as c on a.id_fiche_perso = c.id_perso");
			$count = $stmt[0]->count;
		}


		$page = (isset($arg[0]) && isset($arg[1]) && ($arg[0] == 'page') && is_numeric($arg[1])) ? $arg[1] : 1;
		$nbypage = (isset($_SESSION['nbPage'])) ? $_SESSION['nbPage'] : $this->data['nbr_ligne_pagination'];

		$pager = new Pagination();
		$pager->num_results = $count;
		$pager->limit = $nbypage;
		$pager->page = $page;
		$pager->menu_link = $this->data['base_url'];
		$pager->menu_link_suffix = 'membre/index';
		$pager->endurl = "?".http_build_query($_GET, '', '&amp;');;
		$pager->css_class = 'pagination';
		$pager->nbhide = 4;
		$pager->run();

		$this->data['pagination'] = $pager;
		$this->data['membres'] = $membre->select("SELECT a.*, b.nom as nomabo, c.* FROM tp_membre as a left join tp_abonnement as b on a.id_abo = b.id_abo left join tp_fiche_personne as c on a.id_fiche_perso = c.id_perso $search limit $pager->offset, $pager->limit", array(':search' => '%' . $post_search . '%'));
		View::make('membre.index', $this->data);
	}

	public function get_add($arg)
	{
		View::make('membre.add', $this->data);
	}

	public function post_add($arg)
	{
		try {

			if(!Tp_fiche_personne::inscription($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST["mail"], $_POST["password"], $_POST["adresse"], $_POST['cpostal'], $_POST['ville'], $_POST['pays'], 0))
				throw new Exception('Erreur d\'inscription');

			$fiche = new Tp_fiche_personne();
			$id_perso =$fiche->findFirst(array('fields' => 'id_perso','conditions'=> array('email'=> $_POST["mail"])));
			$membre = new Tp_membre();
			$membre->insert(array('id_fiche_perso' => $id_perso->id_perso, 'id_abo' => $_POST['abo'], 'date_abo' => $_POST['date'], 'id_dernier_film' => 0, 'date_inscription' => date("Y-m-d H:i:s")));

			\system\Session::setFlash("<strong>Info:</strong> Utilisateur ajouté.", "success");

		}
		catch(Exception $e){
			\system\Session::setFlash('<strong>Erreur:</strong>  '.$e->getMessage(), "danger");
		}

		\system\Router::redirect('accueil','action_index');

		$this->get_index($arg);
	}

	public function get_edit($arg)
	{
		if(!isset($arg['0']) || !is_numeric($arg['0']))
			$arg['0'] = 1;

		$pdo = new Tp_Membre();
		$this->data['membre'] = $pdo->findFirst(array('conditions'=> array('id_membre'=> $arg['0'])));

		$pdo2 = new Tp_fiche_personne();
		$this->data['perso'] = $pdo2->findFirst(array('conditions'=> array('id_perso'=> $this->data['membre']->id_fiche_perso)));
		View::make('membre.edit', $this->data);
	}

	public function post_edit($arg)
	{
		if(!isset($arg['0']) || !is_numeric($arg['0']))
			$arg['0'] = 1;

		$user = new Tp_fiche_personne($_POST['id_perso']);
		$user->nom = $_POST['nom'];
		$user->prenom = $_POST['prenom'];
		$user->date_naissance = $_POST['date_naissance'];
		$user->email = $_POST['mail'];
		$user->password = $_POST['password'];
		$user->adresse = $_POST['adresse'];
		$user->cpostal = $_POST['cpostal'];
		$user->ville = $_POST['ville'];
		$user->pays = $_POST['pays'];
		$user->sauvegarderLUtilisateur();

		$membre = new Tp_membre();
		$membre->update(array('id_abo' => $_POST['abo'], 'date_abo' => $_POST['date'], 'id_dernier_film' => 0, 'date_inscription' => date("Y-m-d H:i:s")), array('id_fiche_perso' => $_POST['id_perso']));

		$this->get_index($arg);
	}

	public function get_delete($arg)
	{
		if(!isset($arg['0']) || !is_numeric($arg['0']))
			$arg['0'] = 1;

		$user = new Tp_fiche_personne($arg);
		$pdo = new Tp_Membre();
		$pdo->delete(array('id_membre' => $arg['0']));
		$pdo->delete(array('id_perso' => $user->id_perso), 'tp_fiche_personne');
		$this->get_index($arg);
	}
}