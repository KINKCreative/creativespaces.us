<?php

/*

Imported from:

{
  "name": "adrexia/subsite-modeladmins",
  "description": "Extensions for subsite support of ModelAdmins and data objects",
  "type": "silverstripe-module",
  "keywords": ["silverstripe"],
  "license": "BSD-3-Clause",
  "authors": [
    {
      "name": "Naomi Guyer",
      "email": "naomi@silverstripe.com"
    }
  ],
  "require":
  {
    "silverstripe/framework": "~3.1",
    "silverstripe/cms": "~3.1"
  }
}

*/

class SubsiteAdminExtension extends DataExtension {

  public function updateEditForm($form){
    if(Subsite::currentSubsiteID()) {
      $gridField = $form->Fields()->fieldByName($this->sanitiseClassNameExtension($this->owner->modelClass));
      if(class_exists('Subsite')){
        $list = $gridField->getList()->filter(array('SubsiteID'=>Subsite::currentSubsiteID()));
        $gridField->setList($list);
      }
    }
  }

  /**
   * Sanitise a model class' name (original method not avaliable to extension)
   * @return string
   */
  protected function sanitiseClassNameExtension($class) {
    return str_replace('\\', '-', $class);
  }

  public function subsiteCMSShowInMenu(){
    return true;
  }
}
