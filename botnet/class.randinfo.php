<?php
class RandomInfo
{
	private $names;
	private $first;
	private $last;
	
	public function __construct($file) {
		$this->names = explode("\n", trim(file_get_contents($file)));		
	}
	
	public function nick() {
		$this->first = trim($this->names[rand(0, count($this->names))]);
		$this->last = trim($this->names[rand(0, count($this->names))]);
		
		return $this->first . $this->last . rand(100, 9999);
	}
	
	public function ident() {
		return $this->first . $this->last[0] . rand(10, 99);
	}
	
	public function realName() {
		return $this->first . " " . $this->last;
	}
	
	public function randomString($len) {
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $len);
	}
}
?>