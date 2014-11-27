<?php
namespace application\controllers;
use system\Controller;
use system\View;

class Accueil extends Controller {

	public $restful = false;

	public function action_index($arg)
	{
		View::make('accueil.index', $this->data);
	}
}