<?php

class Blogroll extends Page implements PermissionProvider {

   	private static $db = array(
   	);
	
	private static $has_many = array(
		"Articles" => "Article"
	);
	
//	static $defaults = array(
//	);
		
//	static $allowed_children = array("none");
	
	function DropdownTitle() {
		$String = '' . $this->Parent()->Title . ' --- ' . $this->Title;
		return $String;
	}
	
	function providePermissions() {
	    return array(
	      "POST_ARTICLES_FRONTEND" => "Post articles on frontend",
	    );
	  }
	  
	  public function getCMSFields() {
	  	$fields = parent::getCMSFields();
	  	// $categories = $this->Categories();
	  	// if($categories) {
	  	// 	$fields->addFieldToTab("Root.Content.Categories", 
	  	// 		new CheckboxSetField("AggregateCategories","Gather other categories",$categories->map("ID","Title"))
	  	// 	);
	  	// }
	  	return $fields;
	  }
	  
	  public function Categories() {
	  	return DataObject::get("Blogroll");
	  }
}
 
class Blogroll_Controller extends Page_Controller {

	private static $allowed_actions = array(
		'article',
		'new',
		'NewArticleForm'
	);

	public function getBlogroll() {
		
		if(!isset($_GET['start']) || !is_numeric($_GET['start']) || (int)$_GET['start'] < 1) 
	    {
	        $_GET['start'] = 0;
	    }
		
		$SQL_start = (int)$_GET['start'];
		
		$filter = "Published=1 ";
		if($this->AggregateCategories!="") {
			$filter.=" AND BlogrollID IN(".$this->AggregateCategories.")";
		}
		else {
			$filter.=" AND BlogrollID=$this->ID";
		}
		$blogroll = DataObject::get("Article",$filter,"","","{$SQL_start},10");
		if($blogroll) {
			return $blogroll;
		}
	}
	
	function article()
	{	
		if($Item = $this->getCurrentItem()) {
			$Data = array(
				'Title' => $Item->Title,
				'Content' => $Item->Content,
				'MetaTitle' => $Item->Title,
				'Images' => $Item->Images(),
				'ImageCount' => $Item->Images()->Count(),
				'Item' => $Item,
				'ThumbnailURL' =>$Item->ThumbnailURL(),
				'AbsoluteLink' =>$Item->AbsoluteLink()
			);
			return $this->customise($Data)->renderWith(array('Article','Page'));	
		}
	    else {
			return $this->httpError(404, _t("Blog.NOTFOUND","Blog entry not found."));
		}
	}
	
	public function getCurrentItem()
	    {
	        $Params = $this->getURLParams();
	        $URLSegment = Convert::raw2sql($Params['ID']);  
			if($URLSegment && $Item = DataObject::get_one('Article',
	        	"URLSegment = '" . $URLSegment . "'"))
			{       
			return $Item;
		}
	}
	
	function NewArticleForm() 
		{
			$imageField= new MultipleFileUploadField('Images', 'Upload images');
			$imageField->setUploadFolder('images/posts');
	      	// Create fields
		    $fields = new FieldSet(
				new TextField('Title',"Titulo"),
				new HtmlEditorField('Content',"Contenido",8),
				new HeaderField("Imagenes",5),
				$imageField,
				new TextareaField('VideoEmbed','Embed Code YouTube'),
				new HiddenField('BlogrollID', "", $this->ID),
				new CheckboxField('Featured','Feature on Inicio',1)
			);
		 	
		    $sendAction = new FormAction('doSubmitArticle', 'Añadir entrada');
		    $sendAction->extraClass("round");
		    $actions = new FieldSet(
		    	$sendAction
		    );
			
			//$validator = new RequiredFields('');
							
		    return new Form($this, 'NewArticleForm', $fields, $actions);
		}
	 	
		function doSubmitArticle($data, $form) {
		 			 
	         $newArticle = new Article();
	         $form->saveInto($newArticle);
	         $newArticle->write();
	         
	         $link = $newArticle->absoluteLink();
	        $this->setMessage("success","<h3>Nueva entrada con titulo '<strong>".$data["Title"]."</strong>' fue publicada!</h3><p><a href='".$link."'>Vista previa aquí.</a></p>");
		    Director::redirectBack();
		}
	
	public function nuevo()
	{	
		Validator::set_javascript_validation_handler('none'); 
		//Requirements::javascript("http://ajax.microsoft.com/ajax/jquery.validate/1.8/jquery.validate.min.js");
		if(Permission::check('POST_ARTICLES_FRONTED')) {
			$Data = array(
				'MetaTitle' => "Nueva entrada",
				'Title' => "Nueva entrada",
				'Form' => $this->NewArticleForm(),
				'ProvideComments' => false
			);
			return $this->customise($Data)->renderWith('Page');
		}
		else {
			$this->SetMessage('error','No puedes añadir entradas.');
			Director::redirectBack($this->Link());
		}
	}
	
	public function FeaturedPost($n=1) {
		$p = DataObject::get("Article","Featured=1 AND Published=1","Created DESC","",$n);
		if($p) {
			return $p;
		}
	}
	
}

