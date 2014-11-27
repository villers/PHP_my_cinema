<?php
namespace application\controllers;
use system\Controller;
use system\View;
use system\helper\Pagination;
use application\models\tp_Reduction;

class Reduction extends Controller {

	public $restful = true;

	public function get_index($arg)
	{
		$reduction = new tp_Reduction();

		$type = (isset($_GET['type']))? $_GET['type'] : 'titre';
		$post_search = (isset($_GET['search']))? $_GET['search'] : '%';


		$page = (isset($arg[0]) && isset($arg[1]) && ($arg[0] == 'page') && is_numeric($arg[1])) ? $arg[1] : 1;
		$nbypage = (isset($_SESSION['nbPage'])) ? $_SESSION['nbPage'] : $this->data['nbr_ligne_pagination'];

		$pager = new Pagination();
		$pager->num_results = $reduction->count();
		$pager->limit = $nbypage;
		$pager->page = $page;
		$pager->menu_link = $this->data['base_url'];
		$pager->menu_link_suffix = 'reduction/index';
		$pager->endurl = "?".http_build_query($_GET, '', '&amp;');;
		$pager->css_class = 'pagination';
		$pager->nbhide = 4;
		$pager->run();

		$this->data['pagination'] = $pager;
		$this->data['reductions'] = $reduction->select("SELECT * FROM tp_reduction limit $pager->offset, $pager->limit");
		View::make('reduction.index', $this->data);
	}
}