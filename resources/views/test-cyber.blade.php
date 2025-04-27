<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="payment/payment_confirmation.php" method="post">
    <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
    <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
    <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset>
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25"><br/>
            <span>reference_number:</span><input type="text" name="reference_number" size="25"><br/>
            <span>amount:</span><input type="text" name="amount" size="25"><br/>
            <span>currency:</span><input type="text" name="currency" size="25"><br/>
            <input name="card_name" type="text" placeholder="Name"  value="" autocomplete="off" >
            <input name="card_last_name" type="text" placeholder="Last Name"  value="" autocomplete="off" >
            <input id="card_number" type="text" name="card_number"  placeholder="Card Number" value=""  autocomplete="off" maxlength="19" >
            <input id="card_expiration" type="text" name="card_expiry_date"  value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
            <input id="card_csv" type="password" name="card_cvn"  placeholder="CSV"  value="" autocomplete="off" maxlength="4" >

            {{-- <input type="text" name="bill_to_forename" value="Kevin">
            <input type="text" name="bill_to_surname" value="Armas">
            <input type="text" name="bill_to_email" value="kevinarmas7@gmail.com">
            <input type="text" name="bill_to_address_line1" value="Guatemala">
            <input type="text" name="bill_to_address_city" value="Guatemala">
            <input type="text" name="bill_to_address_postal_code" value="502">
            <input type="text" name="bill_to_address_state" value="Guatemala">
            <input type="text" name="bill_to_address_country" value="US">
            <input type="text" name="bill_address1" value="Guatemala">
            <input type="text" name="bill_city" value="Guatemala">
            <input type="text" name="bill_country" value="Guatemala">
            <input type="text" name="customer_email" value="kevinarmas7@gmail.com">
            <input type="text" name="customer_lastname" value="Armas"> --}}
        </div>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit"/>
    <script type="text/javascript" src="payment_form.js"></script>
</form>

    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/payment_form.js')}}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/jquery-1.7.min.js')}}"></script> --}}
</body>
</html>
