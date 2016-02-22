<?php
class ResumePage extends Page {

  //CMS fields
  function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->removeByName("Images");
    $fields->removeByName("Sections");
    $fields->addFieldToTab("Root.Resume",
        $imageField = UploadField::create('Image',"Upload your Resume Image")->setAllowedFileCategories('image')
    );

    $imageField->appendUploadFolder("images");

    return $fields;
  }
}
class ResumePage_Controller extends Page_Controller {

  public function init() {
    parent::init();
  }

}
