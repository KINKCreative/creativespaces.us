<?php

class ProfilePage extends Page {

 	private static $db = array(
 	);

	private static $has_one = array(
	);
	
	private static $has_many = array(
		'Profiles' => 'Profile'
	);
	
	private static $defaults = array(
	);
		
	private static $allowed_children = array("none");
	
	function getCMSFields() {
	    $fields = parent::getCMSFields();
	 	
	 	$gridFieldConfig = GridFieldConfig_RecordEditor::create(50); 
		// $gridFieldConfig->addComponent(new GridFieldBulkManager());
		// $gridFieldConfig->addComponent(new GridFieldBulkImageUpload());   
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));    
	
		$ProfileManager = new GridField("Profiles", "Profiles", $this->Profiles()->sort("SortOrder"), $gridFieldConfig);
	 	
	 	$fields->addFieldToTab("Root.Profiles",$ProfileManager);
	 	
		return $fields;
	}
		
}
 
class ProfilePage_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
//		date_default_timezone_set('America/Los_Angeles');
//		$date = date('d', time());
//		$hour = date('H', time());
//		if(($date=="26" & (int)$hour >= 22) || (int)$date>26 || (isset($_GET["demo"])&&$_GET["demo"]==1)) {
//			Director::redirect("/registrate");
//		}
	}
	
	public function SortedProfiles() {
		return $this->Profiles()->sort("SortOrder ASC");
	}
	
//	public function RMinute() {
//		date_default_timezone_set('America/Los_Angeles');
//		$minute = date('i', time());
//		$rminutes = 60-$minute;
//		if($rminutes<10) {
//			$rminutes = "0".$rminutes;
//		}
//		if($rminutes=="60") {
//			$rminutes="00";
//		}
//		return $rminutes;
//	}
//	
//	public function RHour() {
//		date_default_timezone_set('America/Los_Angeles');
//		$hour = date('H', time());
//		$rhour = 22-$hour-1;
//		if($rhour<10) {
//			$rhour = "0".$rhour;
//		}
//		return $rhour;
//	}
//	
//	public function RSecond() {
//			date_default_timezone_set('America/Los_Angeles');
//			$second = date('s', time());
//			$rsecond = 60-$second;
//			if($rsecond<10) {
//				$rsecond = "0".$rsecond;
//			}
//			return $rsecond;
//		}
		
}

