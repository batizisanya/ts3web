<?php

/**
 * TeamSpeak 3 Viewer Example
 * --------------------------
 * A TeamSpeak 3 Viewer can be used to display detailed status information about a TeamSpeak 3 Server on your website. 
 * While most other libraries only support a single virtual server, our framework provides a powerful and easy-to-use 
 * interface to implement your individual TeamSpeak 3 Viewer with unique features and designs.
 *
 * Using the RecursiveIterator interface of PHP 5, you're able to render a tree based on every TeamSpeak3_Node_Abstract 
 * object, may it be host, server, channel, client or even server/channel group.
 */

/* load framework library */
require_once("../libraries/TeamSpeak3/TeamSpeak3.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>TeamSpeak 3 Viewer Example | TeamSpeak 3 PHP Framework <?= TeamSpeak3::LIB_VERSION; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="font-family: tahoma, arial, verdana, helvetica, sans-serif; font-size: 12px;">

<?php

try
{
  /* connect to server and get TeamSpeak3_Node_Server object by URI */
  $ts3_VirtualServer = TeamSpeak3::factory("serverquery://127.0.0.1:10011/?server_port=9987#no_query_clients");

  /* display virtual server viewer using HTML interface */
  echo $ts3_VirtualServer->getViewer(new TeamSpeak3_Viewer_Html("../images/viewer/"));
  
  /* display runtime from default profiler */
  echo "<br />Generated in " . TeamSpeak3_Helper_Profiler::get()->getRuntime() . " seconds";
}
catch(Exception $e)
{
  echo "Error (ID " . $e->getCode() . ") <b>" . $e->getMessage() . "</b>";
}

?>

</body>

</html>
