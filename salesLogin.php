<?php 
   session_start(); // get access to default $_SESSION[] array
   include('includes/sales_db_connection.php');  /* Connection to database */
   if(!empty($_POST)){  // to check if form was submit
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    $sqlGetQuerry = " SELECT * FROM `shop_user_login` WHERE `userName` LIKE '$userName' AND `userPassword` LIKE '$userPassword' ";
    $sqlDBResult = $database->query($sqlGetQuerry);

    if($sqlDBResult->num_rows > 0){
       //checking all rows
       while($tableRows = $sqlDBResult->fetch_assoc())
       {
        $_SESSION['userName'] = $tableRows['userName'];
        $_SESSION['userType'] = $tableRows['userType'];
        break;
       } 
    }
    header('Location:salesForm.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
      <form name="salesLoginForm" method="POST" action="">
        <h2> LOGIN PAGE </h2>
        <label for="userName">User Name</label>
        <input id="userName" placeholder="Enter User Name" class="formInput" type="text" name="userName">

        <label for="userPassword">Password</label>
        <input id="userPassword" placeholder="Enter Password" class="formInput" type="password" name="userPassword">

        <br /><br />
    
        <input type="submit" value="Submit" name="submit" class="submitbtn">
      </form>
  </main>
</body>
</html>