<?php

class UploadExtension extends DataExtension {

  public function appendUploadFolder($folderName = "Uploads") {
    $baseFolder = $this->owner->folderName;
    $this->owner->setFolderName($baseFolder . '/' . $folderName);
    return $this->owner;
  }

}
