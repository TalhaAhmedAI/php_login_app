<?php
    
class DbConnection{
    private $host = 'localhost';
    private $name = 'root';
    private $key = '';
    private $database = 'php_login_app';
    protected $con;

    public $username;
    public $email;
    public $password;

    function __construct() {  
        $this->con = new mysqli($this->host, $this->name, $this->key, $this->database);  
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