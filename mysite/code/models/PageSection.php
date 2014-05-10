<?php

class PageSection extends DataObject {
		
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Content' => 'HTMLText',
		'ExtraClass' => 'Varchar(128)',
		'SortOrder' => 'Int'
	);

	private static $has_one = array (
		'Image' => 'Image',
		'Page' => 'Page',
		'DisplayPage' => 'Page'
	);
	
	function getCMSFields() {

		$uploadField = UploadField::create('Image','Select section image')
						->setFolderName("images/backgrounds")
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
		$pages = DataObject::get("Page");
    	if($pages) {
    		$pageField = DropdownField::create("DisplayPageID", "Featured page", $pages->map("ID" , "Title"))->setEmptyString("Select");
    	}
	    //$fields = parent::getCMSFields();
	    	
		return new FieldList(
			new TextField('Title'),
			new TextField('ExtraClass',"Additional CSS Class"),
			HtmlEditorField::create("Content","Content")->setRows(6),
			$uploadField,
			$pageField
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

}