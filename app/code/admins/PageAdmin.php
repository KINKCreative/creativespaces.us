<?php

class PageAdmin extends ModelAdmin
{

    private static $managed_models = array('SiteTree');
    private static $url_segment = 'Site';
    private static $menu_title = 'Site';

    public function getEditForm($id = null, $fields = null){
        $form = parent::getEditForm($id, $fields);
        $fields = $form->Fields();
        $config = $fields->fieldByName('SiteTree')->getConfig();

        $config->addComponent(new GridFieldOrderableRows('Sort'))
            ->addComponent(new GridFieldAddNewMultiClass());
        return $form;
    }

}
