<?php
require_once dirname(__FILE__) . '/Dynamic.php';

class Controller extends Dynamic{
	protected function __construct() {
	}
	public static function getInstance(){
		static $instane = null;
		if($instane === null){
			$instane = new self();
		}
		return $instane;
	}
}
