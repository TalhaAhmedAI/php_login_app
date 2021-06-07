<?php
include_once('dbConnection.php');

class Admin extends DbConnection{
	public function __construct(){
		parent::__construct();
	}

	public function insertData($post){

        $username = $this->con->real_escape_string($_POST['username']);
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string($_POST['password']);

        $query = "INSERT INTO users (username,email,password) VALUES('$username', '$email','$password')";
        $result = mysqli_query($this->con, $query);
        if ($result){
            header("Location:admin_panel.php?msg1=insert.php");
        }else{
            echo "Registration failed try again!";
        }
    }

    public function displayData(){
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->con, $query);
        if ($result->num_rows > 0){
            $data = array();
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
                return $data;
            }else{
                echo "No record found";
            }
        }

    public function displayRecordById($id){
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }

    }

    public function updateRecord($postData){
        $username = $this->con->real_escape_string($_POST['username']);
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string($_POST['password']);
        $id = $this->con->real_escape_string($_POST['id']);

        if(!empty($id) && !empty($postData)){
            $query = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id = '$id'";
            $result = $this->con->query($query);
            if($result){
                header("Location: admin_panel.php?msg2=update");
            }else{
                echo "Update request failed try again!";
            }
        }
    }

    public function deleteRecord($id){
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result){
            header("Location:admin_panel.php?msg3=delete");
        }else{
            echo "Could not delete the record try again!";
        }
    }
}
?>