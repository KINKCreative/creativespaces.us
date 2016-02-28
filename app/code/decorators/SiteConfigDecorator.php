<?php

class SiteConfigDecorator extends DataExtension {

   public static $db = array(
     // Work Fields
    'Unions' => 'Varchar(64)',
    'ImdbURL' => 'Varchar(250)',
    'ActorsAccessURL' => 'Varchar(250)',
    'ActorsGreenRoomURL' => 'Varchar(250)',
     // Social Fields
    'FacebookURL' => "Varchar(250)",
    'TwitterURL' => "Varchar(250)",
    'InstagramURL' => "Varchar(250)",
    'PinterestURL' => "Varchar(250)",
    'SoundCloudURL' => "Varchar(250)",
    'VimeoURL' => "Varchar(250)",
    'YouTubeURL' => "Varchar(250)",
    'GooglePlusURL' => "Varchar(250)",
    'LinkedInURL' => "Varchar(250)",

    // Contact fields
    'Phone' => 'Varchar(64)',
    'Email' => 'Varchar(64)',
    'Address' => 'Varchar(255)',
    'GoogleAnalytics' => 'Text',

    // Theming
    'PrimaryColor' => 'Varchar(7)'
  );

  static $has_one = array(
    'Resume' => 'File',
    'Logo' => 'Image'
  );

  public function updateCMSFields(FieldList $fields) {

    $fields->removeByName('Access');

    if(!Permission::check("ADMIN")) {
        $fields->removeByName('Theme');
    }

    $fields->addFieldToTab("Root.Main",
      $resume = FileAttachmentField::create('Resume', 'Upload resume')
        ->setAcceptedFiles(array('.pdf'))
        ->setThumbnailHeight(200)
        ->setThumbnailWidth(200)
        ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
        ->setMaxFilesize(10)
    );
    // $resume->appendUploadFolder("resume");

    $logoField = UploadField::create('Logo','Upload logo')->setAllowedFileCategories('image');
    $logoField->appendUploadFolder("images");
    $fields->addFieldToTab("Root.Style",
       $logoField
    );

    $fields
      ->tab('Main')
        ->text("Unions", "Your Unions / Tagline")
        ->text("ImdbURL", "IMDB")
        ->text("ActorsAccessURL", "Actor's Access")
        ->text("ActorsGreenRoomURL", "AGROnline Profile")
      ->tab('Social')
        ->text("FacebookURL", "Facebook")
        ->text("TwitterURL", "Twitter")
        ->text("InstagramURL", "Instagram")
        ->text("PinterestURL", "Pinterest")
        ->text("VimeoURL", "Vimeo")
        ->text("SoundCloudURL", "SoundCloud")
        ->text("YouTubeURL", "YouTube")
        ->text("LinkedInURL", "LinkedIn")
        ->text("GooglePlusURL", "Google+")
        ->textarea("GoogleAnalyticsURL", "Enter your Google Analytics tracking code")
      ->tab('Contact')
        // TODO: PhoneNumberField
        ->text("Phone")
        ->email("Email")
        ->textarea("Address")
      ->tab('Style')
        ->color("PrimaryColor");
    }
}
