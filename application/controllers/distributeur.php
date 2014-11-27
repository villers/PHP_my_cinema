<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\helper\Pagination;
use application\models\tp_distrib;

class Distributeur extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		$distrib = new tp_Distrib();

		$page = (isset($arg[0]) && isset($arg[1]) && ($arg[0] == 'page') && is_numeric($arg[1])) ? $arg[1] : 1;
		$nbypage = (isset($_SESSION['nbPage'])) ? $_SESSION['nbPage'] : $this->data['nbr_ligne_pagination'];

		$pager = new Pagination();
		$pager->num_results = $distrib->count();
		$pager->limit = $nbypage;
		$pager->page = $page;
		$pager->menu_link = $this->data['base_url'];
		$pager->menu_link_suffix = 'distributeur/index';
		$pager->endurl = "?".http_build_query($_GET, '', '&amp;');;
		$pager->css_class = 'pagination';
		$pager->nbhide = 4;
		$pager->run();

		$this->data['pagination'] = $pager;
		$this->data['distribs'] = $distrib->select("SELECT * FROM tp_distrib limit $pager->offset, $pager->limit");
		View::make('distributeur.index', $this->data);
	}
}