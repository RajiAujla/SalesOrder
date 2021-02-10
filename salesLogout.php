<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <link rel="stylesheet" href="css/style.css">
    <!-- Use of external CSS-->
</head>
<body>
<?php include('includes/sales_navigation.php') ?>
    <main>
        <div class="customerSales">
        <h2> LOGOUT PAGE </h2>
            <?php  
             echo 'Logout Successfully.';
            ?>
        </div>
    </main>
</body>
</html>