<?php

/**
 * Server Info Example
 * -------------------
 * There are several possibilities to get information about a virtual TeamSpeak 3 Server.
 * 
 * Every node object in the TeamSpeak 3 PHP Framework implements PHP's ArrayAccess interface which means you're able to 
 * access objects as though they were arrays. Whenever you're trying to access a node property which does not exist in the 
 * objects node information, the required information will be requested from the TeamSpeak 3 Server automatically. 
 */

/* load framework library */
require_once("../libraries/TeamSpeak3/TeamSpeak3.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Server Info Example | TeamSpeak 3 PHP Framework <?= TeamSpeak3::LIB_VERSION; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="font-family: tahoma, arial, verdana, helvetica, sans-serif; font-size: 14px;">

<?php

try
{
  /* connect to server and get TeamSpeak3_Node_Server object by URI */
  $ts3_VirtualServer = TeamSpeak3::factory("serverquery://127.0.0.1:10011/?server_port=9987");

  /* access virtual server name using __toString() */
  echo "<h1>Virtual Server - " . $ts3_VirtualServer . "</h1>\n";
  
  /* access virtual server ID with ArrayAccess interface */
  echo "<p>Gathering information about virtual server listening on port <b> " . $ts3_VirtualServer["virtualserver_port"] . "</b> ...</p>\n";
  
  /* display virtual server info from assoc array */
  echo "<table border=1>\n";
  echo "<tr>\n" .
       "  <th>Ident</th>\n" .
       "  <th>Value</th>\n" .
       "</tr>\n";
  foreach($ts3_VirtualServer->getInfo() as $ident => $value)
  {
    echo "<tr>\n" . 
         "  <td>" . $ident . "</td>\n" . 
         "  <td>" . $value . "</td>\n" . 
         "</tr>\n";
  }
  echo "</table>\n";
  
  /* display runtime from adapter profiler */
  echo "<br />Executed " . $ts3_VirtualServer->getAdapter()->getQueryCount() . " queries in " . $ts3_VirtualServer->getAdapter()->getQueryRuntime() . " seconds";
}
catch(Exception $e)
{
  echo "Error (ID " . $e->getCode() . ") <b>" . $e->getMessage() . "</b>";
}

?>

</body>

</html>
