<?php
class BlogAdmin extends ModelAdmin {
	
	private static $url_segment = 'news';
	
	private static $menu_title = 'News';
	
	private static $managed_models = array(
		'Article'
	);
		
	public $showImportForm = false;
	
//	function SearchClassSelector(){
//		return "dropdown";
//	}
	
}