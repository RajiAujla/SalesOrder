<?php 
     session_start(); 
     include('includes/sales_db_connection.php');
     if(!isset($_SESSION['userName'])){
        header('Location:salesLogin.php');
        exit();
     }
     else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All orders</title>

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
      <table class="salesAllOrdersTable"> 
          <thead>
             <tr>
                 <th>Order Number</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone No.</th>
                 <th>Gross Price</th>
             </tr>
          </thead>
          <tbody>
              <?php 
              $sqlSelectQuery = "SELECT * FROM `sales_form` ";
              $sqlDBResult = $database->query($sqlSelectQuery);

              if($sqlDBResult->num_rows > 0){
                 //checking all rows
                 while($tableRows = $sqlDBResult->fetch_assoc())
                 {
                   ?>
                 <tr>
                  <td><?php echo $tableRows['id'];?></td>
                  <td><?php echo $tableRows['customerFirstName'].' '.$tableRows['customerLastName'];?></td>
                  <td><?php echo  $tableRows['customerEmail'];?></td>
                  <td><?php echo  $tableRows['customerPhoneNumber'];?></td>
                  <td>$<?php echo  $tableRows['GrossPrice'];?></td>
                </tr>

                 <?php
                 }
              }
              ?>

          </tbody>
      </table>
  </main>
</body>
</html>
<?php
}