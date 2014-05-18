<?php

class SubsiteUsersTask extends BuildTask {
 
    protected $title = 'Generate subsite groups and users';
 
    protected $description = 'This task will generate / clean up users and user groups for subsites.';
 
    protected $enabled = true;
 
    function run($request) {
    	$subsites = Subsite::get();
        foreach($subsites as $s) {
            // echo("Checking subsite ".$s->Title);
        	if($s->ID > 0) {
        		$group = Group::get()->where("Title = '".$s->Title."'");
        		if(!$group->First()) {
        			$newGroup = Group::create();
        			$newGroup->Title = $s->Title;
        			$newGroup->AccessAllSubsites = 0;
        			$newGroup->write();

                    $newGroup->Subsites()->add($s->ID);
                    $newGroup->Roles()->add(1);
                    $newGroup->write();

        			echo("Added new group for '".$s->Title."'.<br/>");

                    $newMember = Member::create();
                    $name = implode("",explode(".",$s->getPrimaryDomain()));
                    $newMember->Email = $name;
                    $newMember->FirstName = $s->getPrimaryDomain();
                    $newMember->SetPassword = "admin1234";
                    $newMember->write();

                    echo("Added new member $name for '".$s->Title."'");
                    
                    $newMember->Groups()->add($newGroup);
        			
        		}
                else {
                    echo("Group already exists.");
                }
        	}
        }
    }
}