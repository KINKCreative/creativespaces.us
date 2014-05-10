<?php

class PageSection extends DataObject {
		
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int'
	);

	private static $has_one = array (
		'Image' => 'Image',
		'Page' => 'Page'
	);
	
	function getCMSFields() {

		$uploadField = UploadField::create('Image','Select section image')
						->setFolderName("images/backgrounds")
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
		return new FieldList(
			new TextField('Title'),
			new HtmlEditorField("Content"),
			$uploadField
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