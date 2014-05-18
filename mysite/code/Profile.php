<?php

class Profile extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar(255)',
		'JobPosition' => 'Varchar(125)',
		'Text' => 'Text',
		'VideoEmbed' => 'Text',
		'Email' => 'Varchar(64)',
		'Phone' => 'Varchar(20)'
	);
	
	private static $has_one = array (
		'ProfilePage' => 'ProfilePage',
		'Image' => 'Image'
	);
	
	private static $default_sort = "SortOrder ASC";
		
	function getCMSFields_forPopup() {

		$myField = new ImageUploadField('Image','Select image');
		$myField->setUploadFolder("images/profiles");
		
		return new FieldSet(
			new TextField('Title'),
			new TextField('JobPosition'),
			new TextareaField('Text'),
			new TextareaField('VideoEmbed'),
			new TextField('SortOrder'),
			$myField
		);
	}
		
	function canDelete($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	function canCreate($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	function canEdit($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	/*	
	public function Landscape()
	{
		return $this->File()->getWidth() > $this->File()->getHeight();
	}
	
	public function Portrait()
	{
		return $this->File()->getWidth() < $this->File()->getHeight();
	}
	
	public function Large()
	{
		if($this->Landscape())
			return $this->File()->SetWidth(740);
		else {
			return $this->File()->CroppedFromTopImage(740,450);
		}
	}
	*/
	
//	function Link() {
//		if($this->Link) {
//			return $this->Link;
//		}
//		else {
//			return $this->Page()->AbsoluteLink();
//		}
//	}
//	function getTitle() {
//		return $this->Page()->Title;
//	}
}



?>