<?php
require_once("includes/libs/ts3admin.class.php");

class Teamspeak3 {
	private $ts3admin;
	private $error;
	
	public function __construct() {
		if(!($this->ts3admin = new ts3admin("85.214.56.229", 10011))) $this->error .= "<b>ERROR ID:0 </b> TS3 Admin Lib konnte nicht initialisiert werden.";
		if(!$this->ts3admin->connect()) $this->error .= "<b>ERROR ID:1 </b> Konnte nicht mit dem Server verbinden!<br>";
		if(!$this->ts3admin->login("serveradmin", "MkEr1EeY")) $this->error .= "<b>ERROR ID:2 </b> Falsche Serverquery Login Daten!<br>";
		if(isset($_GET['sid'])) {
			if(!$this->ts3admin->selectServer($_GET['sid'])) $this->error .= "<b>ERROR ID:3 </b> Konnte nicht mit Virtuellem Server verbinden!";
		}
		else {
			$this->error .= "<b>ERROR ID: 6 </b> Kein Server ausgewählt!";
		}
		if(!empty($this->error)) die($this->error);
	}
	
	public function list_all_channels() {
		$channels = $this->ts3admin->channelList();
		foreach($channels as $channel) {
			echo '
			<tr style="border:0px dotted black;">
				<td>'.$channel["cid"].'</td>
    		<td>';
			if($channel["pid"] > 0) {
				for($i=0; $i < $channel["pid"]; $i++) {
					echo "-";
				}
			}
			echo
				$channel["channel_name"].'</td>
    		<td>'.$channel["total_clients"].'</td>
			</tr>';
		
		}
	}
	
	public function get_server_info() {
		$info = $this->ts3admin->serverInfo();
		return $info;
	}
	
	public function __destruct() {
		$this->error = "";
		if(!$this->ts3admin->logout()) $this->error .= "<b>ERROR ID:4 </b> Fehler beim Deinitialisieren";
		if(!$this->ts3admin->quit()) $this->error .= "";//"<b>ERROR ID:5 </b> Fehler beim Deinitialisieren";
		if(!empty($this->error)) die($this->error);
	}
}
?>