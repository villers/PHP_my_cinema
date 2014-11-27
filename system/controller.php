<?php
namespace system;
use application\models\Tp_fiche_personne;

abstract class Controller {

	// si vrai la fonction peu être appelé par le type de request
	// ex: get_index(), post_index(), put_index() or delete_index()
	public $restful = false;

	protected $data = array();
	public $login;

	public function __construct()
	{
		$this->data =  Config::$application;
		$this->data['loged'] = false;

		if(Tp_fiche_personne::isLoged())
		{
			$this->login = new Tp_fiche_personne(Session::get('id_perso'));
			$this->data['loged'] = true;
			$this->data['member'] = $this->login;
		}
	}
}