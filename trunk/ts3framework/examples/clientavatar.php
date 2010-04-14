<?php

/**
 * Client Avatar Download Example
 * ------------------------------
 * The TeamSpeak 3 PHP Framework is able to upload and download data from a TeamSpeak 3 Server.
 * 
 * Please note that though PHP presents a very versatile and user friendly interface for handling file uploads, 
 * the default installation is not geared for working with files in excess of 2 MByte.
 */

/* load framework library */
require_once("../libraries/TeamSpeak3/TeamSpeak3.php");

try
{
  /* connect to server and get TeamSpeak3_Node_Client object by URI */
  $ts3_Client = TeamSpeak3::factory("serverquery://127.0.0.1:10011/?server_port=9987&client_name=Nickname");

  /* download avatar and get Mime-Type */
  $avatar_Data = $ts3_Client->avatarDownload();
  $avatar_Type = image_type_to_mime_type($avatar_Data);
}
catch(Exception $e)
{
  die("Error (ID " . $e->getCode() . ") <b>" . $e->getMessage() . "</b>");
}

/* update header to match image type */
header("Content-Type: " . $avatar_Type);

/* display image */
echo $avatar_Data;
