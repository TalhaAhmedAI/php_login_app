<?php
    
class DbConnection{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'php_login_app';
    protected $con;

    function __construct() {  
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);  
        // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        return $this->con;
    }
}
}
?>