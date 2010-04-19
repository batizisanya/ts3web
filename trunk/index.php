<?PHP
require_once("includes/classes/Teamspeak3.php");
$ts3 = new Teamspeak3();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
@import url("includes/css/style.css");
</style>
</head>

<body>

<p class="center">
<?php
$info = $ts3->get_server_info();
echo $info['virtualserver_name'];
?>
</p>
<table class="sample">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Clients</th>
  </tr>
  <?php
	$ts3->list_all_channels();
	?>
</table>
</body>
</html>