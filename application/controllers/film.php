<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\helper\Pagination;
use application\models\Tp_Film;

class Film extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		$film = new Tp_Film();

		$type = (isset($_GET['type']))? $_GET['type'] : 'titre';
		$post_search = (isset($_GET['search']))? $_GET['search'] : '%';

		$search = "";
		$count = 0;
		if(isset($_GET['search'])){
			$search = " where";
			switch ($type) {
				case 'nom':
					$search .= " titre like :search";
					$stmt = $film->select("SELECT count(*) as 'count' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search", array(':search' => '%' . $post_search . '%'));
					$count = $stmt[0]->count;
					break;

				case 'genre':
					$search .= " b.nom like :search";
					$stmt = $film->select("SELECT count(*) as 'count' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search", array(':search' => '%' . $post_search . '%'));
					$count = $stmt[0]->count;
					break;

				case 'distribution':
					$search .= " c.nom like :search";
					$stmt = $film->select("SELECT count(*) as 'count' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search", array(':search' => '%' . $post_search . '%'));
					$count = $stmt[0]->count;
					break;

				case 'date':
					$search .= " date_debut_affiche like :search";
					$stmt = $film->select("SELECT count(*) as 'count' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search", array(':search' => '%' . $post_search . '%'));
					$count = $stmt[0]->count;
					break;

				default:
					$search .= " titre like :search";
					$stmt = $film->select("SELECT count(*) as 'count' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search", array(':search' => '%' . $post_search . '%'));
					$count = $stmt[0]->count;
					break;
			}

		}else{
			$stmt = $film->select("SELECT count(*) as 'count' from tp_film");
			$count = $stmt[0]->count;
		}

		$page = (isset($arg[0]) && isset($arg[1]) && ($arg[0] == 'page') && is_numeric($arg[1])) ? $arg[1] : 1;
		$nbypage = (isset($_SESSION['nbPage'])) ? $_SESSION['nbPage'] : $this->data['nbr_ligne_pagination'];

		$pager = new Pagination();
		$pager->num_results = $count;
		$pager->limit = $nbypage;
		$pager->page = $page;
		$pager->menu_link = $this->data['base_url'];
		$pager->menu_link_suffix = 'film/index';
		$pager->endurl = "?".http_build_query($_GET, '', '&amp;');;
		$pager->css_class = 'pagination';
		$pager->nbhide = 4;
		$pager->run();

		$this->data['pagination'] = $pager;
		$this->data['films'] = $film->select("SELECT a.*, b.nom as 'nom_genre', c.nom as 'nom_distrib' FROM tp_film as a left join tp_genre as b on a.id_genre = b.id_genre left join tp_distrib as c on a.id_distrib = c.id_distrib $search limit $pager->offset, $pager->limit", array(':search' => '%' . $post_search . '%'));
		View::make('film.index', $this->data);
	}

	public function get_add($arg)
	{
		View::make('film.add', $this->data);
	}

	public function post_add($arg)
	{
		$pdo = new Tp_Film();
		$pdo->insert(array('id_genre' => $_POST['genre'], 'titre' => $_POST['titre'], 'resum' => $_POST['resum'], 'id_distrib' => $_POST['distribution'], 'duree_min' => $_POST['duree'], 'annee_prod' => $_POST['annee'], 'date_debut_affiche' => $_POST['date'], 'date_fin_affiche' => $_POST['fin']));
		$this->get_index($arg);
	}

	public function get_edit($arg)
	{
		if(!isset($arg['0']) || !is_numeric($arg['0']))
			$arg['0'] = 1;

		$pdo = new Tp_Film();
		$this->data['film'] = $pdo->findFirst(array('conditions'=> array('id_film'=> $arg['0'])));
		View::make('film.edit', $this->data);
	}

	public function post_edit($arg)
	{
		$pdo = new Tp_Film();
		$pdo->update(array('id_genre' => $_POST['genre'], 'titre' => $_POST['titre'], 'id_distrib' => $_POST['distribution'], 'duree_min' => $_POST['duree'], 'annee_prod' => $_POST['annee'], 'date_debut_affiche' => $_POST['date'], 'date_fin_affiche' => $_POST['fin'], 'resum' => $_POST['resum']), array('id_film' => $_POST['id_film']));
		$this->get_index($arg);
	}

	public function get_delete($arg)
	{
		if(!isset($arg['0']) || !is_numeric($arg['0']))
			$arg['0'] = 1;

		$pdo = new Tp_Film();
		$pdo->delete(array('id_film' => $arg['0']));
		$this->get_index($arg);
	}
}