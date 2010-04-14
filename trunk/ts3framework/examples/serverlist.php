<?php

/**
 * Server List Example
 * -------------------
 * There are several possibilities to get a list of virtual servers in a TeamSpeak 3 Server instance.
 * 
 * The PHP 5 iterator interface is very useful for defining custom behaviour for looping over objects. Each
 * TeamSpeak3_Node_Abstract object implements an iterator which allows you to walk through sub nodes.
 */

/* load framework library */
require_once("../libraries/TeamSpeak3/TeamSpeak3.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Iteration Example | TeamSpeak 3 PHP Framework <?= TeamSpeak3::LIB_VERSION; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="font-family: tahoma, arial, verdana, helvetica, sans-serif; font-size: 14px;">

<?php

try
{
  /* connect to server and get TeamSpeak3_Node_Host object by URI */
  $ts3_ServerInstance = TeamSpeak3::factory("serverquery://127.0.0.1:10011/");

  /* access total number of running servers with ArrayAccess interface */
  echo "<h1>Virtual Server List - Found " . $ts3_ServerInstance["virtualservers_running_total"] . " Servers</h1>\n";
  
  /* iterate through host and list virtual servers */
  echo "<table border=1>\n";
  echo "<tr>\n" .
       "  <th>ID</th>\n" .
       "  <th>Name</th>\n" .
       "  <th>Status</th>\n" .
       "  <th>Unique Identifier</th>\n" .
       "  <th>Clients Online</th>\n" .
       "  <th>Network Port</th>\n" .
       "</tr>\n";
  foreach($ts3_ServerInstance as $ts3_VirtualServer)
  {
    echo "<tr>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_id"] . "</td>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_name"] . "</td>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_status"] . "</td>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_unique_identifier"] . "</td>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_clientsonline"] . "</td>\n" .
         "  <td>" . $ts3_VirtualServer["virtualserver_port"] . "</td>\n" .
         "</tr>\n";
  }
  echo "</table>\n";
  
  /* display runtime from adapter profiler */
  echo "<br />Executed " . $ts3_ServerInstance->getAdapter()->getQueryCount() . " queries in " . $ts3_ServerInstance->getAdapter()->getQueryRuntime() . " seconds";
}
catch(Exception $e)
{
  echo "Error (ID " . $e->getCode() . ") <b>" . $e->getMessage() . "</b>";
}

?>

</body>

</html>
