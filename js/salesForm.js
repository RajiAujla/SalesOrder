$(document).ready(function() {
    /* to insert values of salesForm  */
    $('#mysalesForm').on('submit', function(result) {
        result.preventDefault(); //stop from refreshing the page

        var customerFirstName = $('#customerFirstName').val();
        var customerLastName = $('#customerLastName').val();
        var customerPassword = $('#customerPassword').val();
        var customerConformPassword = $('#customerConformPassword').val();
        var customerEmail = $('#customerEmail').val();
        var customerPhoneNumber = $('#customerPhoneNumber').val();
        var customerCrayonQtn = $('#customerCrayonQtn').val();
        var customerWaterColorQtn = $('#customerWaterColorQtn').val();
        var customerPostCode = $('#customerPostCode').val();
        var customerAddress = $('#customerAddress').val();
        var customerCity = $('#customerCity').val();
        var customerProvince = $('#customerProvince').val();
        var CustomerCreditCardNumber = $('#CustomerCreditCardNumber').val();
        var customerCreditExpiryMonth = $('#customerCreditExpiryMonth').val();
        var customerCreditExpiryYear = $('#customerCreditExpiryYear').val();

        $.ajax({
            type: 'POST',
            url: 'salesProcess.php',
            data: {
                customerFirstName: customerFirstName,
                customerLastName: customerLastName,
                customerPassword: customerPassword,
                customerConformPassword: customerConformPassword,
                customerEmail: customerEmail,
                customerPhoneNumber: customerPhoneNumber,
                customerCrayonQtn: customerCrayonQtn,
                customerWaterColorQtn: customerWaterColorQtn,
                customerPostCode: customerPostCode,
                customerAddress: customerAddress,
                customerCity: customerCity,
                customerProvince: customerProvince,
                CustomerCreditCardNumber: CustomerCreditCardNumber,
                customerCreditExpiryMonth: customerCreditExpiryMonth,
                customerCreditExpiryYear: customerCreditExpiryYear
            },
            success: function(data) {
                $('#customerFormResult').html(data);
            }
        });

    });
});