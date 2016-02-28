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
		'Page' => 'Page'
		// 'DisplayPage' => 'Page'
	);

	function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");
		$fields->removeByName("PageID");
		$fields->removeByName("ExtraClass");

		$uploadField = UploadField::create('Image','Featured Image')
						->appendUploadFolder("images/backgrounds")
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));

  	$fields
  		->tab("Main")
	  		->text("Title");

  	if($this->Page()->Subsite()->AdvancedFeatures) {
  		$fields
  			->tab("Advanced")
  				->text("ExtraClass");
  	}

  	$fields->addFieldToTab("Root.Main",
  		HtmlEditorField::create("Content","Content")->setRows(8)
  	);

  	$pages = DataObject::get("Page");
  	if($pages) {
  		$pageField = DropdownField::create("DisplayPageID", "Featured page", $pages->map("ID" , "Title"))->setEmptyString("Select");
  	}
  	$fields->addFieldToTab("Root.Advanced",
  		$pageField
  	);
		// return new FieldList(
		// 	new TextField('Title'),
		// 	new TextField('ExtraClass',"Additional CSS Class"),
		// 	HtmlEditorField::create("Content","Content")->setRows(6),
		// 	$uploadField,
		// 	$pageField
		// );
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

}
