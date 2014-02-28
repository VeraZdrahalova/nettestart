<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Slovicko presenter.
 */
class SlovickoPresenter extends BasePresenter
{
	/** @var Nette\Database\Context */
	private $database;
	
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
	
	
	public function renderAhoj()
	{
		$this->template->posts = $this->database->table('posts')
		->order('created_at DESC')
		->limit(5);
	//	$this->template->anyVariable = 'any value';
	}

}
