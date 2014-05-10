<?php
class Page extends SiteTree {
	
	private static $db = array(
		'CustomHtml' => 'Text',
		'Summary' => 'Varchar(500)'
	);
	
	private static $has_one = array(
		'Image' => "Image"
	);
	
	private static $has_many = array(
		'Images' => 'PageImage',
		'Sections' => 'PageSection'
	);
	
	function getCMSFields() {
	    $fields = parent::getCMSFields();

	 	if(!Permission::check('ADMIN')){ 
	 		$fields->removeByName(_t('SiteTree.TABTODO')); 
	 		$fields->removeByName(_t('SiteTree.TABBEHAVIOUR'));
	 		$fields->removeByName('Access');
	 		$fields->removeByName('Google Sitemap');
	 	}
	 	
	 	$gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
		$gridFieldConfig->addComponent(new GridFieldBulkManager());
		$gridFieldConfig->addComponent(new GridFieldBulkImageUpload());   
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));    
		$photoManager = new GridField("Images", "Images", $this->Images()->sort("SortOrder"), $gridFieldConfig);
		
		$imageField = UploadField::create('Image','Choose main image')->setAllowedFileCategories('image');
		$imageField->setFolderName("images"); 

	 	$sectionConfig = GridFieldConfig_RecordEditor::create(); 
		$sectionConfig->addComponent(new GridFieldSortableRows('SortOrder'));    
		$sectionManager = new GridField("Sections", "Sections", $this->Sections()->sort("SortOrder"), $sectionConfig);
		
		$fields->addFieldToTab("Root.Images",new HeaderField("ImageNote","Main image",3));
		$fields->addFieldToTab("Root.Images",$imageField);
		$fields->addFieldToTab("Root.Images",new LiteralField("ImageNote2","<br/>"));
		$fields->addFieldToTab("Root.Images",new HeaderField("ImageNote3","Photos / slider images",3));
		$fields->addFieldToTab("Root.Images",$photoManager);
	 	
	 	$fields->addFieldToTab("Root.Main", new TextareaField("Summary","Enter summary"));
	 	$fields->addFieldToTab("Root.Main", new TextareaField("CustomHtml","Custom HTML code",4));

	 	$fields->addFieldToTab("Root.Sections", $sectionManager);
	 	
		return $fields;
	}
	
	public function onBeforeWrite () {
		parent::onBeforeWrite();
	}
	
    public function IsAdmin() {
      return Permission::check('ADMIN') ? 1 : 0;
     }

	public function canDelete($member = null) {
		return Permission::check('ADMIN');
	}
	
	static $api_access = true;
		
}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
		//	'LoginForm',
		//'SiteSearchForm',
		//'doSearchResults'
		'index'
	);

	public function init() {
		Requirements::clear('jsparty/prototype.js');
		parent::init();
	}
	    
//	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
//			$page = $this;
//			$parts = array();
//			$i = 0;
//			while(
//				$page  
//	 			&& (!$maxDepth || sizeof($parts) < $maxDepth) 
//	 			&& (!$stopAtPageType || $page->ClassName != $stopAtPageType)
//	 		) {
//				if($showHidden || $page->ShowInMenus || ($page->ID == $this->ID)) { 
//					if($page->URLSegment == 'home') $hasHome = true;
//					if(($page->ID == $this->ID) || $unlinked) {
//					
//						$ttitle=Convert::raw2xml($page->Title);
//						if(str_word_count($ttitle) > 9) {
//							$shortened = implode(' ',array_slice(str_word_count($ttitle,1),0,9));
//							$ttitle= $shortened."...";	
//						}
//						
//					 	$parts[] = "<li>".$ttitle."</li>";
//					} else {
//						$parts[] = ("<li><a href=\"" . $page->Link() . "\">" . Convert::raw2xml($page->Title) . "</a><span class=\"divider\">/</span></li>"); 
//					}
//				}
//				$page = $page->Parent;
//			}
//	
//			return implode("", array_reverse($parts));
//		}

//	public function PrevNextPage($Mode = 'next') {
//	   
//	  if($Mode == 'next'){
//	    $Where = "ParentID = $this->ParentID AND Sort > $this->Sort";
//	    $Sort = "Sort ASC";
//	  }
//	  elseif($Mode == 'prev'){
//	    $Where = "ParentID = $this->ParentID AND Sort < $this->Sort";
//	    $Sort = "Sort DESC";
//	  }
//	  else{
//	    return false;
//	  }
//	  
//	  $dob= DataObject::get("Page", $Where, $Sort, null, 1);
//	  return $dob ? $dob : false;
//	     
//	}
	
	function Siblings() {
		if($this->ParentID) {
		  $whereStatement = "ClassName!='ErrorPage' AND ParentID = ".$this->ParentID;
		  return DataObject::get("Page", $whereStatement);
		 }
	 }
	 
	 function getMetaTitle() {
	 	return $this->Title;
	 }
	
	public function setMessage($type, $message)
	   {   
	   	   $message = array(
	   	       'MessageType' => $type,
	   	       'Message' => $message
	   	   );
	   	   $messageArray = array();
	   	   if($tmp = Session::get("Message")) {
	   	     $messageArray = $tmp;
	   	   }
	   	   $messageArray[] = $message;	   	   
	       Session::set('Message', $messageArray);
	   }
	
	public function getMessage(){
		if($message = Session::get('Message')){
			$array = new ArrayList($message);
			Session::clear('Message');
			return $array->renderWith('Message');
		}
	}
	
	public function IsAdmin() {
	  return Permission::check('ADMIN');
	 }
	
	
	public function YouTubeID($embedcode) {
		preg_match('/youtube[.]com\/(v|embed)\/([^"?]+)/', $embedcode, $match);
		return $match[2];
	}
	
	function ThumbnailURL($width=300) {
		if($this->VideoEmbed) {
			return "http://img.youtube.com/vi/".singleton("Page_Controller")->YouTubeID($this->VideoEmbed)."/0.jpg";
		}
		if($this->ImageID) {
			return $this->Image()->SetWidth($width)->URL;
		}
		if($this->Images()->Count()>0) {
			return $this->Images()->First()->Image()->SetWidth($width)->URL;
		}
		return "http://www.placehold.it/300x200&text=No+image";
	}
	
	function RandomPages($n=5) {
		$i = DataObject::get("Page","ImageID > 0","RAND()","",$n);
		if($i) {
			return($i);
		}
	}
	
	public function getRecentArticles() {
		$s = DataObject::get("Article","Published=1","Created DESC","",5);
		if($s) {
			return $s;
		}
	}
	
}