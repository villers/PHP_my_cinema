<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\helper\Pagination;
use application\models\tp_Personnel;

class Personnel extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		$personnel = new tp_Personnel();


		$page = (isset($arg[0]) && isset($arg[1]) && ($arg[0] == 'page') && is_numeric($arg[1])) ? $arg[1] : 1;
		$nbypage = (isset($_SESSION['nbPage'])) ? $_SESSION['nbPage'] : $this->data['nbr_ligne_pagination'];

		$pager = new Pagination();
		$pager->num_results = $personnel->count();
		$pager->limit = $nbypage;
		$pager->page = $page;
		$pager->menu_link = $this->data['base_url'];
		$pager->menu_link_suffix = 'personnel/index';
		$pager->endurl = "?".http_build_query($_GET, '', '&amp;');;
		$pager->css_class = 'pagination';
		$pager->nbhide = 4;
		$pager->run();

		$this->data['pagination'] = $pager;
		$this->data['personnels'] = $personnel->select("SELECT a.*, b.*, c.nom as nomjob FROM tp_personnel as a left join tp_fiche_personne as b on a.id_fiche_perso = b.id_perso left join tp_job as c on a.id_job = c.id_job limit $pager->offset, $pager->limit");
		View::make('personnel.index', $this->data);
	}
}