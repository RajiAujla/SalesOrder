<?php 
        include('includes/sales_db_connection.php');  /* Connection to database */

       
        $customerFirstName = $_POST['customerFirstName'];
        $customerLastName = $_POST['customerLastName'];
        $customerPassword = $_POST['customerPassword'];
        $customerConformPassword = $_POST['customerConformPassword'];
        $customerEmail = $_POST['customerEmail'];
        $customerPhoneNumber = $_POST['customerPhoneNumber'];
        $customerCrayonQtn = $_POST['customerCrayonQtn'];
        $customerWaterColorQtn = $_POST['customerWaterColorQtn'];
        $customerPostCode = $_POST['customerPostCode'];
        $customerAddress = $_POST['customerAddress'];
        $customerCity = $_POST['customerCity'];
        $customerProvince = $_POST['customerProvince'];
        $CustomerCreditCardNumber = $_POST['CustomerCreditCardNumber'];
        $customerCreditExpiryMonth = $_POST['customerCreditExpiryMonth'];
        $customerCreditExpiryYear = $_POST['customerCreditExpiryYear'];   
        

        $customerCrayonQtn = $_POST['customerCrayonQtn'];
        $costCrayon = 2;
        $totalCrayonPrice = $customerCrayonQtn * $costCrayon;
        $totalCrayonPrice = number_format($totalCrayonPrice,2);

        $customerWaterColorQtn = $_POST['customerWaterColorQtn'];
        $customerWater = 5;
        $totalWaterColorPrice = $customerWater * $customerWaterColorQtn;
        $totalWaterColorPrice = number_format($totalWaterColorPrice,2);
        /*Calculates sales tax according to province*/
        $TotalOfTwoProducts = $totalCrayonPrice + $totalWaterColorPrice;

        $ToatlIncludeTax = 0;
        if ($customerProvince == 'Alberta')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.05; /* Tax 5% = 0.05 ,TotalInculdeTax means total tax customer have to pay Now, Price = Tax+ Price */
       else if ($customerProvince == 'BritishColumbia')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.12; /* Tax 12% */
       else if ($customerProvince == 'Manitoba')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.12; /* Tax 12% */
       else if ($customerProvince == 'NewBrunswick')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.15; /* Tax 15% */
       else if ($customerProvince == 'NewfoundlandAndLabrador')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.15; /* Tax 15% */
       else if ($customerProvince == 'NorthwestTerritories')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.05; /* Tax 5%  */
       else if ($customerProvince == 'NovaScotia')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.15; /*Tax 15% */
      else if ($customerProvince == 'Nunavut')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.05; /* Tax 5% */
      else if ($customerProvince == 'Ontario')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.13; /* Tax 13% */
      else if ($customerProvince == 'PrinceEdwardIsland')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.15; /* Tax 15% */
      else if ($customerProvince == 'Quebec')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.14975; /* Tax 14.975%  */
      else if ($customerProvince == 'Saskatchewan')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.11; /* Tax 11% */
      else if ($customerProvince == 'Yukon')
        $ToatlIncludeTax = $TotalOfTwoProducts * 0.05; /* Tax 5% */

        $GrossPrice = $ToatlIncludeTax + $TotalOfTwoProducts;
        $TotalOfTwoProducts = number_format($TotalOfTwoProducts,2);
        $ToatlIncludeTax = number_format($ToatlIncludeTax,2);
        $GrossPrice = number_format($GrossPrice,2);

        if($GrossPrice < 10){
          echo 'The minimum purchase should be of $10.';
         } else {

        //Insert into 'assignment5' database
        $sqlInsertQuery = "
               INSERT INTO `sales_form` 
               (`customerFirstName`, `customerLastName`, `customerPassword`, `customerConformPassword`, `customerEmail`, 
               `customerPhoneNumber`, `customerCrayonQtn`, `customerWaterColorQtn`, `customerPostCode`, `customerAddress`, `customerCity`,
               `customerProvince`,`CustomerCreditCardNumber`, `customerCreditExpiryMonth`, `customerCreditExpiryYear`, `TotalOfTwoProducts`, 
               `ToatlIncludeTax`, `GrossPrice`) 
               VALUES 
               ('$customerFirstName', '$customerLastName', '$customerPassword', '$customerConformPassword', '$customerEmail', 
               '$customerPhoneNumber', '$customerCrayonQtn', '$customerWaterColorQtn', '$customerPostCode', '$customerAddress', '$customerCity',
               '$customerProvince', '$CustomerCreditCardNumber', '$customerCreditExpiryMonth', '$customerCreditExpiryYear', '$TotalOfTwoProducts', 
               '$ToatlIncludeTax', '$GrossPrice');
        ";

        $sqlDBResult = $database->query($sqlInsertQuery);
        if(!$sqlDBResult){
          exit($database->error.'Erros occured. Try again.');
        }

        echo "Customer Name: $customerFirstName $customerLastName <br>
              Customer Email: $customerEmail <br>
              Customer Phone Number: $customerPhoneNumber <br><br>
              Kids Colors: Crayon: $customerCrayonQtn <br>
                           Water Colors: $customerWaterColorQtn <br><br>
              Customer PostCode: $customerPostCode <br>
              Customer Address: $customerAddress <br>
              Customer City: $customerCity <br>
              Customer Province / Terrority: $customerProvince <br><br>
              Sub Total Of Products: $$TotalOfTwoProducts <br>
              Total Tax: $$ToatlIncludeTax <br>
              Amount: $$GrossPrice <br><br>
              Customer Credit Card Number: $CustomerCreditCardNumber <br>
              Customer Credit Card Expiry Month: $customerCreditExpiryMonth<br> 
              Customer Credit Card Expiry Year: $customerCreditExpiryYear <br>";
        } 







