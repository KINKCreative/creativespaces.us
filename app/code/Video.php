<?php

class Video extends DataObject {

  static $db = array(
    'IMDBLink' => 'Varchar(512)'
  );
  static $has_one = array(
    'VideoPage' => 'VideoPage',
    'EmbeddedObject' => 'EmbeddedObject'
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->removeByName("EmbeddedObjectID");
    $fields->removeByName("VideoPageID");
    $fields->addFieldToTab("Root.Main",
      $embedField = EmbeddedObjectField::create('EmbeddedObject', 'Paste URL to your video', $this->EmbeddedObject())
    );
    $fields->addFieldToTab("Root.Main",
      TextField::create('IMDBLink', "Project's IMDB Link")
    );
    $embedField->setEditableEmbedCode(true);

    return $fields;
  }

  public function getTitle() {
    if($this->EmbeddedObject()) {
      return $this->EmbeddedObject()->Title;
    }
  }

  public function onBeforeDelete() {
    parent::onBeforeDelete();
    if($this->EmbeddedObject()) {
      $this->EmbeddedObject()->delete();
    }
  }

}

?>
