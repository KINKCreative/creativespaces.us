<?php

class Video extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Description' => 'Text',
		'VimeoID' => 'Varchar(32)',
		'YouTubeID' => 'Varchar(32)',
		'ThumbnailURL' => 'Varchar(256)'
	);
	
	private static $has_one = array(
		"Project" => "Project"
	);
	
	private static $summary_fields = array(
		"Title",
		"Project"=>"Project.Title"
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("ThumbnailURL");			
			
		if(!$this->ID) {
			
		}
		else {
			$fields->removeByName("ProjectID");
			$fields->addFieldToTab("Root.Main",
				new ReadonlyField("ThumbnailURL", "Thumbnail URL", $this->ThumbnailURL)
			);
			$fields->addFieldToTab("Root.Main",
				new LiteralField("Thumbnail", "<img src=\"".$this->ThumbnailURL."\" />")
			);
		}
		return $fields;
	}
	
	function onBeforeWrite() {
	
		parent::onBeforeWrite();
		if($this->VimeoID && $this->isChanged("VimeoID")) {
			$url = 'http://vimeo.com/api/v2/video/'.$this->VimeoID. '/php';
			$contents = @file_get_contents($url);
			$array = @unserialize(trim($contents));
			$thumb = $array[0]["thumbnail_large"];
			if($thumb) {
				$this->ThumbnailURL = $thumb;
			}
		}
		else if($this->YouTubeID && $this->isChanged("YouTubeID")) {
			$this->ThumbnailURL = "http://img.youtube.com/vi/".$this->YouTubeID."/0.jpg";
		}
	}
	
	function getVideoEmbed() {
		if($this->VimeoID) {
			return '<iframe src="http://player.vimeo.com/video/'.$this->VimeoID.'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		}
		elseif($this->YouTubeID) {
			return '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$this->YouTubeID.'?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>';
		}
		return false;
	}

}
