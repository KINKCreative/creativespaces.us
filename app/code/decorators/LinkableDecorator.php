<?php

class Linkable extends DataExtension {

	private static $db = array(
		'URLSegment' => 'Varchar(255)'
	);
	private static $indexes = array(
		'URLSegment' => true
	);
	
	public function updateCMSFields(FieldList $fields) {
		$uf = SiteTreeURLSegmentField::create("URLSegment","URL Segment");
		$uf->setURLPrefix(Director::BaseURL() . $this->getURLPrefix());
		$fields->addFieldToTab("Root.Main", $uf,"Title");
	}
	
	public function populateDefaults() {
	    $this->owner->URLSegment = "new-".strtolower($this->owner->ClassName);
	    $this->owner->Title = "New ".strtolower($this->owner->ClassName);
	    parent::populateDefaults();
	}
	
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$classname=strtolower($this->owner->ClassName);
		
		$filter = URLSegmentFilter::create();
		
		if((!$this->owner->URLSegment || $this->owner->URLSegment=='new-'.$classname) && $this->owner->Title !='New '.$classname) {
			$this->owner->URLSegment = $filter->filter($this->owner->Title);
		}
		else if ($this->owner->isChanged('URLSegment')) {
			$segment = preg_replace('/[^A-Za-z0-9]+/','-',$this->owner->URLSegment);
			$segment = preg_replace('/-+/','-',$segment);
			
			if(!$segment) {
				$segment = $classname."-".$this->owner->ID;
			}
			$this->owner->URLSegment = $segment;	
		}
		
		$count=2;
		while($this->LookForExistingURLSegment($this->owner->URLSegment)) {
			$this->owner->URLSegment = preg_replace('/-[0-9]+$/', null, $this->owner->URLSegment).'-'.$count;
			$count++;
		}
	}
	
	function LookForExistingURLSegment($URLSegment) {
		return(DataObject::get_one($this->owner->ClassName, "URLSegment = '".$URLSegment."' AND ".$this->owner->ClassName.".ID != ".$this->owner->ID));
	}
	
	function getURLPrefix() {
		$p = $this->owner->URLPrefix;
		return ($p ? $p : strtolower($this->owner->ClassName))."/";
	}
	
	function Link() {
		return $this->getURLPrefix().$this->owner->URLSegment;
	}
	
	function AbsoluteLink() {
		return Director::baseURL().$this->Link();
	}
 
}