<?php
/*
REQUIREMENTS
* A custom slash command on a Slack team
* A web server running PHP5 with cURL enabled
USAGE
* Place this script on a server running PHP5 with cURL.
* Set up a new custom slash command on your Slack team:
  http://my.slack.com/services/new/slash-commands
* Under "Choose a command", enter whatever you want for
  the command. /isitup is easy to remember.
* Under "URL", enter the URL for the script on your server.
* Leave "Method" set to "Post".
* Decide whether you want this command to show in the
  autocomplete list for slash commands.
* If you do, enter a short description and usage hint.
*/
# Grab some of the values from the slash command, create vars for post back to Slack
$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];
# Check the token and make sure the request is from our team
if($token != 'vnLfaOlI7natbpU5tKQBm5dQ'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. Check your script.";
  die($msg);
  echo $msg;
}
# isitup.org doesn't require you to use API keys, but they do require that any automated script send in a user agent string.
# You can keep this one, or update it to something that makes more sense for you
$user_agent = "DC-Slack/1.0";

// Submit json to done channel



// https://api.slack.com/incoming-webhooks
