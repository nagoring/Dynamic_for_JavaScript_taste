<?php
require_once dirname(__FILE__) . '/TraitDynamic.php';

class Controller {
	use TraitDynamic;
	public static function getInstance(){
		static $instane = null;
		if($instane === null){
			$instane = new self();
		}
		return $instane;
	}
}
