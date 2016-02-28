<?php

class FileDecorator extends DataExtension {

  public function updateCMSFields(FieldList $fields) {
    $fields->removeByName("Title");
    $fields->removeByName("Name");
    $fields->removeByName("OwnerID");
    $fields->removeByName("Folder");
    $fields->removeByName("ParentID");
    // $fields->removeByName("FilePreviewData");
  }

}
