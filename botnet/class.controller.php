<?php
class BotController {
	private $bot;
	private $info;
	private $users;
	
	public function __construct() {
		$this->info = new RandomInfo(__DIR__ . "/names.txt");
	}
	
	public function setBot($bot) {
		$this->bot = $bot;
	}
	
	public function msg($chan, $msg) {
		$this->bot->raw("PRIVMSG " . $chan . " :" . $msg);
	}
	
	public function newNick($times = 1) {
		for ($i = 0; $i < $times; $i++) {
			$this->bot->raw("NICK " . $this->info->nick());
		}
	}
	
	public function setUsers($users) {
		$this->users = array_keys($users);
	}
	
	public function usersToString() {
		return implode(" ", $this->users);
	}
}
?>