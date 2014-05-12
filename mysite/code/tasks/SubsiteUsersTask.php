<?php

class SubsiteUsersTask extends BuildTask {
 
    protected $title = 'Generate subsite groups and users';
 
    protected $description = 'This task will generate / clean up users and user groups for subsites.';
 
    protected $enabled = true;
 
    function run($request) {
    	$subsites = Subsite::get();
        foreach($subsites as $s) {
        	if($s->ID>0) {
        		$group = Group::get()->where("Title = '".$s->Title."'");
        		if(!$group) {
        			$newGroup = Group::create();
        			$newGroup->Title = $s->Title;
        			$newGroup->AccessAllSubsites = 0;
        			$newGroup->write();

                    $role = PermissionRole::get()->where("ID = 1");

                    $newGroup->Subsites()->add($s);
                    $newGroup->Roles()->add($role);

        			echo("Added new group for '$Title'.<br/>");

                    $newMember = Member::create();
                    $name = implode("",explode(".",$s->getPrimaryDomain()));
                    $newMember->Email = $name;
                    $newMember->FirstName = $s->getPrimaryDomain();
                    $newMember->SetPassword = "admin1234";
                    $newMember->write();

                    echo("Added new member $name for '$Title'");
                    
                    $newMember->Groups()->add($newGroup);
        			
        		}
        	}
        }
    }
}