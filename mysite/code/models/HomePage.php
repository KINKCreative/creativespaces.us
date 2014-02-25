<?php
class HomePage extends Page {

	private static $db = array(
		"FeaturedProductTagline" => "Varchar(64)"
	);

	private static $has_one = array(
		'FeaturedProduct' => 'Product'
	);
	
	function getCMSFields() {
		    $fields = parent::getCMSFields();
		    if(class_exists("Product")) {
		    	$products = DataObject::get("Product","","Title ASC");
		    	if($products) {
		    		$fields->addFieldToTab("Root.Content.Featured",new DropdownField("FeaturedProductID", "Featured product", $products->toDropdownMap("ID","Title","Select")));
		    		$fields->addFieldToTab("Root.Content.Featured", new TextField("FeaturedProductTagline"));
		    	}
		    }
		 	
			return $fields;
		}

}
class HomePage_Controller extends Page_Controller {

	private static $allowed_actions = array ();

	public function init() {
		parent::init();
	}
	
	public function Blogroll() {
		$b = DataObject::get("Article","Published=1","","",3);
		if($b) {
			return $b;
		}
	}
	
	public function getInstagram() {
		$instagram = new RestfulService("https://api.instagram.com/v1/tags/".INSTAGRAM_TAG."/media/recent", 1800);
		$params = array("client_id" => INSTAGRAM_CLIENT_ID);
		$instagram->setQueryString($params);
		$iconn = $instagram->request();
		
		$iarray = json_decode($iconn->getBody(), true);
		
		$results = new DataObjectSet();
		//print_r($results->First()); //->images->thumbnail->url
		foreach($iarray["data"] as $item) {
			//print_r($item["images"]["thumbnail"]["url"]."<br/>");
			 $results->push(
				new ArrayData(
					array(
						'ImageURL' => $item["images"]["standard_resolution"]["url"],
						'Link' => $item["link"],
						'InstagramID' => $item["id"]
					)
				)
			); 
		}
		return $results;
	}
	
	public function Projects() {
		$p = Project::get();
		return $p;
	}	
}