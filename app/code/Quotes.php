<?php

class Quotes extends Page {

	public static $db = array(
	);

	public static $has_one = array(
	);

	static $has_many = array (
		'QuoteItems' => 'Quote'
	);

	function getCMSFields() {
	    $fields = parent::getCMSFields();

	 	$gridFieldConfig = GridFieldConfig_RecordEditor::create(50);
		// $gridFieldConfig->addComponent(new GridFieldBulkManager());
		// $gridFieldConfig->addComponent(new GridFieldBulkImageUpload());
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$QuoteManager = new GridField("Quotes", "Quotes", $this->QuoteItems()->sort("SortOrder"), $gridFieldConfig);

	 	$fields->addFieldToTab("Root.Quotes",$QuoteManager);

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

	// public function getCMSFields()
	// {
	// 	$f = parent::getCMSFields();
	// 	$quoteManager = new DataObjectManager(
	// 		$this, // Controller
	// 		'QuoteItems', // Source name
	// 		'Quote', // Source class
	// 		array(
	// 			'QuoteText' => 'QuoteText',
	// 			'Medium' => 'Medium',
	// 			'Link' => 'Link'
	// 		), // Headings
	// 		'getCMSFields_forPopup',  // Detail fields (function name or FieldSet object)
	// 		 '', 			// Filter clause
	// 		 '' 			// Sort clause
	// 		// Join clause
	// 	);


	// 	$f->addFieldToTab("Root.Content.Quotes",$quoteManager);

	// 	return $f;

	// }
}

class Quotes_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}

}

?>
