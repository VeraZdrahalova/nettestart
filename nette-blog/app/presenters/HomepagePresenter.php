<?php

namespace App\Presenters;

use Nette,
	App\Model;

/*
Homepage:default

http://nette.start/nette-blog/www/

Matched?	yes	
Class		Route
Mask		<presenter>/<action>[/<id>]	
Defaults	presenter = Homepage
			action = default
			id = NULL	
Module	
Request		Homepage:default
			id = NULL
			
App\Presenters\HomepagePresenter::renderDefault() in .../app/presenters/HomepagePresenter.php:23
*/
/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	/** @var Nette\Database\Context */
	private $database;
	
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
	
	
	public function renderDefault()
	{
		$this->template->posts = $this->database->table('posts')
		->order('created_at DESC')
		->limit(5);
		Nette\Diagnostics\Debugger::dump($this->template->posts);
		/*Nette\Database\Table\Selection #72c2
		connection protected => Nette\Database\Connection #f9d4
		reflection protected => Nette\Database\Reflection\DiscoveredReflection #0f92
		connection protected => Nette\Database\Connection #f9d4
		cache protected => Nette\Caching\Cache #c582
		storage private => Nette\Caching\Storages\FileStorage #5e56 { ... }
		namespace private => "Nette.Database.025c6ead58c06231c40d3eefcf6d7806\x00" (48)
		key private => NULL
		data private => NULL
		structure protected => array (1)
		primary => array (1) [ ... ]
		loadedStructure protected => array (1)
		primary => array (1) [ ... ]
		cache protected => Nette\Caching\Cache #554d
		storage private => Nette\Caching\Storages\FileStorage #5e56
		dir private => "/var/www/nette.start/web/nette-blog/temp/cache" (46)
		useDirs private => TRUE
		journal private => Nette\Caching\Storages\FileJournal #a7c8 { ... }
		locks private => NULL
		namespace private => "Nette.Database.025c6ead58c06231c40d3eefcf6d7806\x00" (48)
		key private => NULL
		data private => NULL
		sqlBuilder protected => Nette\Database\Table\SqlBuilder #01a3
		name protected => "posts" (5)
		primary protected => "id" (2)
		primarySequence protected => FALSE
		rows protected => NULL
		data protected => NULL
		dataRefreshed protected => FALSE
		globalRefCache protected => array (1)
		"" => array (1)
		referencingPrototype => array ()
		refCache protected => array (1)
		referencingPrototype => array ()
		generalCacheKey protected => NULL
		specificCacheKey protected => NULL
		aggregation protected => array ()
		accessedColumns protected => NULL
		previousAccessedColumns protected => NULL
		observeCache protected => FALSE
		keys protected => array ()
		*/
		
	//	$this->template->anyVariable = 'any value';
	}

}
