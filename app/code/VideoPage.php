<?php

class VideoPage extends Page {

  private static $db = array(
  );

  private static $has_one = array(
    'VideoPage' => 'VideoPage'
  );

  private static $has_many = array(
    'Videos' => 'Video'
  );

  private static $defaults = array(
  );

  private static $allowed_children = array("none");

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $gridFieldConfig = GridFieldConfig_RecordEditor::create(50);
    $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

    $VideoManager = new GridField("Videos", "Videos", $this->Videos()->sort("SortOrder"), $gridFieldConfig);

    $fields->addFieldToTab("Root.Videos", $VideoManager);

    return $fields;
  }

}

class VideoPage_Controller extends Page_Controller {

  public function init() {
    parent::init();
  }

  public function SortedProfiles() {
    return $this->Videos()->sort("SortOrder ASC");
  }

}

