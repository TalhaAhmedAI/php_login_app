<?php
include_once('dbConnection.php');

class User extends DbConnection{
	public function __construct(){
		parent::__construct();
	}

	public function register($username, $email, $password){
        $query    = "INSERT INTO users (username, email, password)
                     VALUES ('$username','$email', '$password')";
        $result   = mysqli_query($this->con, $query);
        return $result;
       }
       
    public function login($username, $password){
        $query    = "SELECT * FROM users WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($this->con, $query);
        $rows = mysqli_num_rows($result);
        return $rows;
       }
}
?>