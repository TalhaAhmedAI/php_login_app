<?php
    
class DbConnection{
    // private $host = 'localhost';
    // private $name = 'root';
    // private $key = '';
    // private $database = 'php_login_app';
    private $user = getenv('CLOUDSQL_USER');
    private $pass = getenv('CLOUDSQL_PASSWORD');
    private $inst = getenv('CLOUDSQL_DSN');
    private $db = getenv('CLOUDSQL_DB');
    protected $con;

    public $username;
    public $email;
    public $password;

    function __construct() {  
        $this->con = new mysqli(null, $user, $pass, $db, null, $inst);  
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