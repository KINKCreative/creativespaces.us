<?php
class ContactPage extends Page {
  static $db = array(
    'SubmitText' => 'HTMLText' //Text presented after submitting message
  );

  //CMS fields
  function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $subsite = Subsite::currentSubsite();
    $config = SiteConfig::current_site_config();
    if($config && !$config->Email) {
      $emailNote = "<div class='message warning'>Configure the e-mail under your <strong>Settings</strong> > <strong>Contact</strong> tab to display the form for your visitors.</div>";
    }
    else {
      $emailNote = "<div class='message good'>The messages from your visitors will be forwarded to <strong>{$config->Email}</strong>.</div>";
    }
    $fields->insertBefore("Title",
      LiteralField::create("EmailNote", $emailNote)
    );

    $fields->addFieldToTab("Root.Submissions",
      new HTMLEditorField('SubmitText', 'Text on Submission')
    );
    return $fields;
  }
}
class ContactPage_Controller extends Page_Controller {

  public function init() {
    parent::init();
  }

  //Define our form function as allowed
    static $allowed_actions = array(
      'ContactForm'
    );

    //The function which generates our form
    function ContactForm()
    {
      // Create fields
      $fields = new FieldList(
          TextField::create('Name', 'Name'),
          EmailField::create('Email', 'Email'),
          TextareaField::create('Message','Message')
      );

      // Create action
      $actions = new FieldList(
        FormAction::create('SendContactForm', 'Send')->addExtraClass("button btn btn-primary")
      );

      // Create action
      $validator = new RequiredFields('Name', 'Email', 'Message');
      $form = new Form($this, 'ContactForm', $fields, $actions, $validator);
      $form->addExtraClass("contact-form");
      return $form;
    }

    //The function that handles our form submission
    function SendContactForm($data, $form)
    {

      $config = SiteConfig::current_site_config();
      if($config && $config->Email) {

        //Set data
        $from = "no-reply@creativespaces.us";
        $userEmail = $data['Email'];
        $to = $config->Email;
        $subject = "Website Contact";

        $email = new Email($from, $to, $subject);
        //set template
        $email->setTemplate('ContactEmail');
        //populate template
        $email->populateTemplate($data);
        // $email->addCustomHeader('X-Mailgunner-Batch-Message', true);
        $email->replyTo($userEmail);
        //send mail
        $email->send();

        $this->redirect( $this->URLSegment . "/?success=1");

      }
      else {
        $this->redirect( $this->URLSegment . "/?success=0");
      }

    }

    //The function to test whether to display the Submit Text or not
    public function Success()
    {
      $success = $this->request->requestVar("success");
      return $success == "1";
    }
}
