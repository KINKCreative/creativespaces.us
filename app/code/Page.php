<?php

class Page extends SiteTree {

	private static $db = array(
		'CustomHtml' => 'Text',
		'Summary' => 'Varchar(500)',
		'HideMainContent' => 'Boolean'
	);

	private static $has_one = array(
		'Image' => "Image"
	);

	private static $has_many = array(
		'Images' => 'PageImage',
		'Sections' => 'PageSection.Page'
	);

	function getCMSFields() {

		$fields = parent::getCMSFields();

		$fields->removeByName("CopyToSubsiteID");
		$fields->removeByName("copytosubsite");

	 	$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldBulkUpload());
		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));
		$photoManager = new GridField("Images", "Images", $this->Images(), $gridFieldConfig);

    if($s = Subsite::currentSubsite()) {
      $gridFieldConfig->getComponentByType("GridFieldBulkUpload") ->setUfSetup('setFolderName', $s->BaseFolder . "/images");
    }

		$imageField = UploadField::create('Image','Choose main image')->setAllowedFileCategories('image');
		$imageField->appendUploadFolder("images");


		$fields->addFieldToTab("Root.Images",new HeaderField("ImageNote","Main image",3));
		$fields->addFieldToTab("Root.Images",$imageField);
		$fields->addFieldToTab("Root.Images",new LiteralField("ImageNote2","<br/>"));
		$fields->addFieldToTab("Root.Images",new HeaderField("ImageNote3","Images",3));
		$fields->addFieldToTab("Root.Images",$photoManager);

	 	$fields->addFieldToTab("Root.Main", new TextareaField("Summary","Enter summary"));

	 	if(Permission::check('ADMIN')){
	 		// $fields->removeByName("Settings");
	 		// $fields->removeByName('Access');
	 		// $fields->removeByName('Google Sitemap');
	 		$sectionConfig = GridFieldConfig_RecordEditor::create();
			$sectionConfig->addComponent(new GridFieldSortableRows('SortOrder'));
			$sectionManager = new GridField("Sections", "Sections", $this->Sections()->sort("SortOrder"), $sectionConfig);


	 		$fields->addFieldToTab("Root.Sections", $sectionManager);
	 		$fields->addFieldToTab("Root.Advanced", new TextareaField("CustomHtml","Custom HTML code",4));
	 	}
	 	else {
	 		$imageField->setCanAttachExisting(false);
	 	}

		return $fields;
	}

	function getSettingsFields() {
	    $fields = parent::getSettingsFields();
	    $customSettings = new FieldGroup(
	    	new CheckboxField('HideMainContent')
	    );
	    $customSettings->setTitle("Admin settings");
	    $fields->addFieldToTab("Root.Settings",$customSettings);
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

	public function MaxColumns() {
		$count = $this->Children()->count();
		$ccount = ($count>0) ? $count : 3;
		if($ccount > 4) {
			$ccount = 4;
		}
		return $ccount;
	}

	public function IncludeLayout() {
		return $this->renderWith(array("Blank","Include_".$this->ClassName,$this->ClassName));
	}

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

	public function init()
  {
      parent::init();

      Requirements::clear('jsparty/prototype.js');

      $rootFolder = dirname(dirname(__DIR__));
      $themeFolder = $this->ThemeDir();
      $file = file_get_contents($rootFolder . '/' . $themeFolder . '/ss_import.json', true);

      if($file) {
      	$import = json_decode($file, true);

      	$include_final = array();
      	if(!!$import["js"] && count($import["js"])>0) {
      		foreach($import["js"] as $include) {
		      	$include_final[] = $themeFolder . $include;
		      }
      	}

      	Requirements::combine_files(
	        'vendor.js', $include_final
	      );

	      Requirements::combine_files('scripts.js', array(
	        $themeFolder . '/assets/js/main.js',
	        $themeFolder . '/scripts/main.min.js'
	      ));

      }

  }

	public function ImageCount() {
		return $this->Images()->count();
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

	public function ValidPageTypes() {
		return array(
			'HomePage' => array(
				'Label' => 'Home',
				'Required' => 1,
				'Checked' => 1,
				'URLSegment' => 'home',
				'Title' => 'Home'
			),
			'Bio' => array(
				'Label' => 'About me / Biography',
				'Required' => 0,
				'Checked' => 1,
				'URLSegment' => 'about',
			),
			'Gallery' => array(
				'Label' => 'Gallery',
				'Required' => 0,
				'Checked' => 1,
				'URLSegment' => 'gallery',
				'Title' => 'Gallery'
			),
			'VideoPage' => array(
				'Label' => 'Videos',
				'Required' => 0,
				'Checked' => 1,
				'URLSegment' => 'videos',
				'Title' => 'Videos'
			),
			'ResumePage' => array(
				'Label' => 'Resume page (to upload an image of your resume)',
				'Required' => 0,
				'Checked' => 1,
				'URLSegment' => 'resume',
				'Title' => 'Gallery'
			),
			'Quotes' => array(
				'Label' => 'Quotes/Reviews',
				'Required' => 0,
				'Checked' => 0,
				'URLSegment' => 'reviews',
				'Title' => 'Reviews'
			),
			'ContactPage' => array(
				'Label' => 'Contact page',
				'Required' => 0,
				'Checked' => 1,
				'URLSegment' => 'contact',
				'Title' => 'Contact me'
			)
		);
	}


	/* CUSTOM FORMS */

	public function OrderForm() {
        $fields = new FieldList();
        $pageTypeArray = array();
        $checkedTypes = array();
        foreach($this->ValidPageTypes() as $key=>$pt) {
        	$pageTypeArray[$key] = $pt["Label"];
        	if($pt["Checked"]) {
        		$checkedTypes[] = $key;
        	}
        }
        $fields
        	->header("h1", "Your New Website", 3)
        	->text('Domain', 'Domain (if you have one)')
        		->configure()
        			->setAttribute("placeholder", "www.example.com")
        		->end()
        	->header("h1", "Your Information", 3)
        	->text('Name')
        	->email('Email')
        	->password('Password')
        	->password('PasswordConfirm')
        	->checkboxSet('PageTypes','Select pages you will need', $pageTypeArray, $checkedTypes)
        	// ->text('Unions', 'Your Unions')
        	;
        //     TextField::create('Name', 'Your Name'),
        //     TextField::create('')
        // );

        $actions = new FieldList(
            FormAction::create("doOrder")->setTitle("Sign up now")
        );

        $required = new RequiredFields('Name');

        $form = new Form($this, 'OrderForm', $fields, $actions, $required);

        return $form;
    }

     public function doOrder($data, Form $form) {
        $form->sessionMessage('Hello '. $data['Name'], 'success');

        return $this->redirectBack();
    }


}
