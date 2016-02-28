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

	private static $summary_fields = array(
		'Thumbnail' => 'Thumbnail',
		'Caption'
	);

	static $default_sort = "SortOrder ASC";

	function Caption() {
		return $this->Title || $this->Caption;
	}

	function getCMSFields() {

		$myField = new UploadField('Image','Select image');
		$myField->setFolderName("images/pages");
		if(!Permission::check("ADMIN")) {
			$myField->setCanAttachExisting(false);
		}

		return new FieldList(
			new TextField("Title"),
			new TextField('Caption'),
			new TextField("Link"),
			$myField
		);
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

	function Landscape() {
	    return $this->Image()->getWidth() > $this->Image()->getHeight();
	}

	function Portrait() {
	    return $this->Image()->getWidth() < $this->Image()->getHeight();
	}

  public function getThumbnail() {
      return $this->Image()->SetHeight(100);
  }


}



?>
