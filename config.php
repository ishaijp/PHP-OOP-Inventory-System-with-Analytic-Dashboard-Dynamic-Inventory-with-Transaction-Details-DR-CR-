<?php

class DatabaseConnection{
	public function __construct(){
		global $pdo;
		try{
     $pdo = new PDO('mysql:host=localhost;dbname=','root','');
		} catch (PDOException $e) {
			exit('Database error');
		}
	}
}
?>