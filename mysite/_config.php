<?php

global $project;
$project = 'mysite';

global $database;
$database = 'cheerxx';
 
require_once("_db.php");

MySQLDatabase::set_connection_charset('utf8');

i18n::set_locale('en_US');

SiteTree::enable_nested_urls();

Security::setDefaultAdmin("admin","admin");

//BasicAuth::protect_entire_site();

//define("INSTAGRAM_CLIENT_ID","5bebb7f248184804ad17c6534ec42b70");
//define("INSTAGRAM_TAG","leauxstandards");

//SS_Log::add_writer(new SS_LogFileWriter(Director::baseFolder().'/errors.log'), SS_Log::ERR);