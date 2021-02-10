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
    <title>Sales Login Form</title>

    <link rel="stylesheet" href="css/style.css">
    <!-- Use of external CSS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/salesForm.js"></script>
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
    <form name="mysalesForm" id="mysalesForm" method="POST" action="">
        <h1></h1>

        <label for="customerFirstName">First Name</label>
        <input id="customerFirstName" placeholder="First Name" class="formInput" type="text" name="customerFirstName">

        <label for="customerLastName">Last Name</label>
        <input id="customerLastName" placeholder="Last Name" class="formInput" type="text" name="customerLastName">

        <label for="customerPassword">Password</label>
        <input id="customerPassword" placeholder="Password Max 8 Characters Allowed" class="formInput" type="password" name="customerPassword">

        <label for="customerConformPassword">Confirm Password</label>
        <input id="customerConformPassword" placeholder="Password Max 8 Characters Allowed" class="formInput" type="password" name="customerConformPassword">

        <label for="customerEmail">Email</label>
        <input id="customerEmail" placeholder="email@domain.com" class="formInput" type="email" name="customerEmail">

        <label for="customerPhoneNumber">Phone Number</label>
        <input id="customerPhoneNumber" placeholder="123-131-1234" class="formInput" type="text" name="customerPhoneNumber">

        <label id="labelOfColors">Kids Colors</label>
        <label for="customerCrayonQtn">Crayon: $2.00/pack</label>
        <select name="customerCrayonQtn" id="customerCrayonQtn" class="formInput">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>

        <label for="customerWaterColorQtn">Water Colors: $5.00/Pack</label>
        <select name="customerWaterColorQtn" id="customerWaterColorQtn" class="formInput">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>

        <label for="customerPostCode">Post Code</label>
        <input id="customerPostCode" placeholder="X2X2X2" class="formInput" type="text" name="customerPostCode">

        <label for="customerAddress">Address</label>
        <input id="customerAddress" placeholder="Address" class="formInput" type="text" name="customerAddress">

        <label for="customerCity">City</label>
        <input id="customerCity" class="formInput" type="text" name="customerCity">

        <label for="">Province / Territory</label>
        <select name="customerProvince" id="customerProvince" class="formInput">
            <option value="">-- Select --</option>
            <option value="Alberta">Alberta</option>
            <option value="BritishColumbia">British Columbia</option>
            <option value="Manitoba">Manitoba</option>
            <option value="NewBrunswick">New Brunswick</option>
            <option value="NewfoundlandAndLabrador">Newfoundland and Labrador</option>
            <option value="NorthwestTerritories">Northwest Territories</option>
            <option value="NovaScotia">Nova Scotia</option>
            <option value="Nunavut">Nunavut</option>
            <option value="Ontario">Ontario</option>
            <option value="PrinceEdwardIsland">Prince Edward Island</option>
            <option value="Quebec">Quebec</option>
            <option value="Saskatchewan">Saskatchewan</option>
            <option value="Yukon">Yukon</option>
        </select></br>


        <label for="CustomerCreditCardNumber">Credit Crad Number</label>
        <input id="CustomerCreditCardNumber" placeholder="1121-1211-1121-1211" class="formInput" type="text" name="CustomerCreditCardNumber">

        <label for="customerCreditExpiryMonth">Credit Card Expiry Month</label>
        <input id="customerCreditExpiryMonth" placeholder="MMM" class="formInputHalf" type="text" name="customerCreditExpiryMonth"><br/>
        <label for="" id="monthlabelDetails">
            For Card Credit Expiry Month use this format<br/>
            January : JAN, February : FEB, March : MAR, April : APR, May : MAY,
            June : JUN, July : JUL, August : AUG, September : SEP, October : OCT, November : NOV,   December : DEC
        </label><br/>

        <label for="customerCreditExpiryYear">Credit Card Expiry Year</label>
        <input id="customerCreditExpiryYear" placeholder="YYYY" class="formInputHalf" type="text" name="customerCreditExpiryYear">

        <br /><br />

        <input type="submit" value="Submit" name="submit" class="submitbtn">

        <p id="formErrors"></p>
 </form>

        <div class="customerSales">
        <h1></h1>
        <p id="customerFormResult"></p>
    </div>
</body>

</html>
<?php
}