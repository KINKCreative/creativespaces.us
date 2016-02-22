<?php
class Articles extends ModelAdmin {
	
	static $url_segment = 'manage';
	
	static $menu_title = 'Manage';
	
	static $managed_models = array(
		'Article'
	);
		
	public $showImportForm = true;
	
	function SearchClassSelector(){
		return "dropdown";
	}
	
}