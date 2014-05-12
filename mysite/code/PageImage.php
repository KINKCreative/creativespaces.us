<?php

class PageImage extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Caption' => 'Varchar(255)',
		'Link' => 'Varchar(255)',
		'SortOrder' => 'Int'
	);
	
	private static $has_one = array (
		'Page' => 'Page',
		'Image' => 'Image'
	);

	function Caption() {
		return $this->Title || $this->Caption;
	}
	
//	function getCMSFields_forPopup() {
//
//		$myField = new ImageUploadField('Image','Select image');
//		$myField->setUploadFolder("images/pages");
//		return new FieldSet(
//			new TextField('Caption'),
//			new TextField("Link"),
//			$myField
//		);
//	}
		
	function canDelete($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	function canCreate($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	function canEdit($member = NULL) { 
		return Permission::check('CMS_ACCESS_CMSMain'); 
	}
	
	function SmallView() {
		return $this->renderWith('HasManyObject_small');
	}
	
	function forTemplate() {
		return $this->renderWith('PageImage');
	}
	
	function LargeImage() {
		if($this->Image()) {
			// if($this->Image()->Landscape()) {
				return $this->Image()->croppedImage(1280,720);	
			// }
			// else {
			// 	return $this->Image()->SetHeight(1024);	
			// }
		}
	}
	
	function MediumImage() {
		// if($this->Image()) {
		// 	if($this->Image()->Landscape()) {
				return $this->Image()->croppedImage(840,472);	
		// 	}
		// 	else {
		// 		return $this->Image()->SetHeight(680);	
		// 	}
		// }
	}
	
	function SmallImage() {
		// if($this->Image()) {
		// 	if($this->Image()->Landscape()) {
				return $this->Image()->croppedImage(780,438);	
		// 	}
		// 	else {
		// 		return $this->Image()->SetHeight(680);	
		// 	}
		// }
	}
	
	function Square($width = 400) {
		if($this->Image()) {
			return $this->Image()->croppedImage($width,$width);
		}
	}
	
}



?>