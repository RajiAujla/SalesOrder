<?php 
     session_start(); 
     include('includes/sales_db_connection.php');
     if(!isset($_SESSION['userName'])){
        header('Location:salesLogin.php');
        exit();
     }
     else{
          if($_SESSION['userType'] != 'Admin'){
            header('Location:salesLogin.php');
            exit();   
          }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shop Manager</title>

    <link rel="stylesheet" href="css/style.css">
    <!-- Use of external CSS--> 

</head>
<body>
<header>
  <?php 
    if(isset($_SESSION['userName'])){
       echo "Welcome ".$_SESSION['userName'];
    }
    ?>
  </header>
  <?php include('includes/sales_navigation.php') ?>
  <main>
      <form name="salesCreateManager" id="salesCreateManager" method="POST" action="">
      <h2> CREATE SHOP MANAGER PAGE </h2>
        <label for="userName">Manager Name</label>
        <input id="userName" placeholder="Enter Manager Name" class="formInput" type="text" name="userName">

        <label for="userPassword">Manager Password</label>
        <input id="userPassword" placeholder="Enter Password" class="formInput" type="password" name="userPassword">

        <br /><br />
    
        <input type="submit" value="Submit" name="submit" class="submitbtn">
     
        <p id="formErrors">
          <?php

            if(isset($_POST['submit']))
            {
              $userErrors = '';
              $nameRegex = "/^[A-Za-z\s]{1,30}$/";
              $userName = $_POST['userName'];
              $userName = trim($userName);
              if(!preg_match($nameRegex,$userName)){
                $userErrors = 1;
                echo 'Please enter charcter for Manager name <br>';
              }

              $userPassword = $_POST['userPassword'];
              $userPassword = trim($userPassword);
              if($userPassword == ''){
                $userErrors = 1;
                echo 'Please enter Password <br>';
              } else if(strlen($userPassword) > 8) {
                $userErrors = 1;
                echo 'only 8 character allowed in Password <br>';
              } else if(strlen($userPassword) < 3){
                $userErrors = 1;
                echo 'set Password atleast of 3 Characters <br>';
              }
              
              if($userErrors == ''){
                $sqlInsertManagerQuery = "
                INSERT INTO `shop_user_login` 
                (`userName`, `userPassword`, `userType`) 
                VALUES 
                ('$userName', '$userPassword', 'Manager');
                ";

                $sqlManagerResult = $database->query($sqlInsertManagerQuery);
                if($sqlManagerResult){
                  echo "Successfully Create new Manager for store";
                } else {
                    exit('Some error exist. Try again.');
                }
             } 
         }
          ?>
        </p>
     </form>
  </main>
</body>
</html>
<?php
}