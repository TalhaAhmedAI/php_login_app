<?php
  
  include('admin_auth_session.php');
  include('./classes/admin.php');
  include('./layout/header.php');

  $admin = new Admin();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $user = $admin->displayRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $admin->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="container">
  <form action="edit.php" method="POST">
    <div class="form-group">
      <label for="name">Username:</label>
      <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Password:</label>
      <input type="text" class="form-control" name="password" value="<?php echo $user['password']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>