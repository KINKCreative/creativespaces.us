<?php

class Profile extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(255)',
		'JobPosition' => 'Varchar(125)',
		'Text' => 'Text',
		'VideoEmbed' => 'Text',
		'Email' => 'Varchar(64)',
		'Phone' => 'Varchar(20)',
		'TwitterUsername' => 'Varchar(32)',
		'InstagramUsername' => 'Varchar(32)',
		'GooglePlus' => 'Varchar(255)',
		'Facebook' => 'Varchar(255)',
		'Website' => 'Varchar(255)'
	);

	private static $has_one = array (
		'ProfilePage' => 'ProfilePage',
		'Image' => 'Image'
	);

	private static $default_sort = "SortOrder ASC";

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$myField = new UploadField('Image','Select image');
		$myField->setFolderName("images/profiles");
		$fields->addFieldToTab("Root.Main", $myField);
		return $fields;
	}

	function canDelete($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}
	function canCreate($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}
	function canEdit($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}

	function canView($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}

	static $summary_fields = array(
		"ID",
		"Title",
		"Created"
	);

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
