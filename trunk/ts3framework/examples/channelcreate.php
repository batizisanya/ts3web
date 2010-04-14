<?php

/**
 * Channel Create Example
 * ----------------------
 * Creating channels is very easy using the TeamSpeak 3 PHP Framework. Simply call the appropriate method and provide
 * an associative array containing all the properties you want.
 * 
 * Creating new virtual servers is working the same way.
 */

/* load framework library */
require_once("../libraries/TeamSpeak3/TeamSpeak3.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Channel Create Example | TeamSpeak 3 PHP Framework <?= TeamSpeak3::LIB_VERSION; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="font-family: tahoma, arial, verdana, helvetica, sans-serif; font-size: 14px;">

<?php

try
{
  /* connect to server, login and get TeamSpeak3_Node_Server object by URI */
  $ts3_VirtualServer = TeamSpeak3::factory("serverquery://127.0.0.1:10011/?server_port=9987");

  /* create semi-perm channel and get new ID */
  echo "Creating first temporary channel on virtual server " . $ts3_VirtualServer . " ... ";
  $cid1 = $ts3_VirtualServer->channelCreate(array(
    "channel_name" => "My Channel",
    "channel_topic" => "This is my first channel...",
  ));
  echo "Done (ID " . $cid1 . ")<br />\n";
  
  /* create temp sub-channel and get new ID */
  echo "Creating first temporary sub-channel on virtual server " . $ts3_VirtualServer . " ... ";
  $cid2 = $ts3_VirtualServer->channelCreate(array(
    "channel_name" => "My Sub-Channel",
    "channel_topic" => "This is my second channel...",
    "cpid" => $cid1,
  ));
  echo "Done (ID " . $cid2 . ")<br />\n";
  
  /* create temp sub-channel and get new ID */
  echo "Creating second temporary sub-channel on virtual server " . $ts3_VirtualServer . " ... ";
  $cid3 = $ts3_VirtualServer->channelCreate(array(
    "channel_name" => "My Sub-Sub-Channel",
    "channel_topic" => "This is my third channel...",
    "cpid" => $cid2,
  ));
  echo "Done (ID " . $cid3 . ")<br />\n";
}
catch(Exception $e)
{
  echo "Error (ID " . $e->getCode() . ") <b>" . $e->getMessage() . "</b>";
}

?>

</body>

</html>
