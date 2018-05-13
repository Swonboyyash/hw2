<?php
class User implements JsonSerializable {
	private $username;
	private $password;
	private $email;

	public function getUsername() { return $this->username; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }

	public function jsonSerialize() {
		return [
			'username'	=> $this->username,
			'password'	=> $this->password,
			'email'		=> $this->email	
		];
	}
}
?>
