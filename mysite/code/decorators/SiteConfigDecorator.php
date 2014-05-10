<?php

class SiteConfigDecorator extends DataExtension {
     
    private static $db = array(
    	'Facebook' => 'Varchar(255)',
        'Twitter' => 'Varchar(255)',
        'GooglePlus' => 'Varchar(255)',
        'LinkedIn' => 'Varchar(255)',
        'Pinterest' => 'Varchar(255)',
        'GoogleAnalytics' => 'Text'
    );
 
    public function updateCMSFields(FieldList $fields) {
    	if(Permission::check("ADMIN")) {
    		$fields->removeByName("Theme");
    	}
        $fields->addFieldToTab("Root.Main", new TextField("Twitter"));
        $fields->addFieldToTab("Root.Main", new TextField("Facebook"));
        $fields->addFieldToTab("Root.Main", new TextField("GooglePlus"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkedIn"));
        $fields->addFieldToTab("Root.Main", new TextField("Pinterest"));
        $fields->addFieldToTab("Root.Main", new TextareaField("GoogleAnalytics","Your Google analytics code"));
    }
}