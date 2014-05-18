<?php

class Quote extends DataObject {
	
	static $db = array(
		'QuoteText' => 'Text',
		'Name' => 'Varchar(255)',
		'Link' => 'Varchar(255)'
	);
	
	static $defaults = array(
	);
	
	static $has_one = array (
		'Quotes' => 'Quotes'
	);
		
	function getCMSFields() {
		return new FieldList(
			new TextareaField('QuoteText'),
			new TextField('Name'),
			new TextField('Link')
		);
	}

}

?>