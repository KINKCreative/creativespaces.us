<?php

class ArticleImage extends DataObject {

	private static $db = array(
		'Caption' => 'Text'
	);

	private static $has_one = array (
		'Article' => 'Article',
		'Image' => 'Image'
	);

//	function getCMSFields_forPopup() {
//
//		$myField = new ImageUploadField('Image','Select image');
//		$myField->setUploadFolder("images/posts");
//		return new FieldSet(
//			new TextField('Caption')
//		);
//	}

	function canDelete($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}
	function canCreate($member = NULL) {
		Permission::check('CMS_ACCESS');
	}
	function canEdit($member = NULL) {
		return Permission::check('CMS_ACCESS');
	}
	function canView($member = NULL) {
		return Permission::check('CMS_ACCESS');
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

	function Link() {
		return $this->Article()->Link();
	}

	public function RandColSize() {
		return rand(2,3);
	}
	function getTitle() {
		return $this->Article()->Title;
	}

}



?>
