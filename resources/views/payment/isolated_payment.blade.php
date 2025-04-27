@extends('layouts.clean')


@section('content')
    <section>
        @php
            session_start();
            // Invoice 1152 Quotation 4091
            $_SESSION['PSGLI1152Q4091'] = true;
            $_SESSION['total'] = 1415.4;
        @endphp
        <form id="new_payment_form" action="/payment/payment_confirmation.php" method="post" >
            <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
            <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
            <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
            <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,currency_symbol">
            <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
            <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
            <input type="hidden" name="locale" value="en">
            <fieldset hidden>
                <legend>Payment Details</legend>
                <div id="paymentDetailsSection" class="section">
                    <span>transaction_type:</span><input type="text" name="transaction_type" size="25" value="sale"><br/>
                    <span>reference_number:</span><input type="text" name="reference_number" size="25" value="PSGLI1152Q4091"><br/>
                    <span>amount:</span><input type="text" name="amount" size="25" value="1415.4"><br/>
                    <span>currency:</span><input type="text" name="currency" size="25" value="USD"><br/>
                    <span>currency:</span><input type="text" name="currency_symbol" size="25" value="$"><br/>
                    <input name="card_name" type="text" placeholder="Name"  value="" autocomplete="off" >
                    <input name="card_last_name" type="text" placeholder="Last Name"  value="" autocomplete="off" >
                    <input id="card_number" type="text" name="card_number"  placeholder="Card Number" value=""  autocomplete="off" maxlength="19" >
                    <input id="card_expiration" type="text" name="card_expiry_date"  value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
                    <input id="card_csv" type="password" name="card_cvn"  placeholder="CSV"  value="" autocomplete="off" maxlength="4" >
                </div>
            </fieldset>
            <section class="hidden">
                <h3 class="text-right font-bold text-lg">$1415.4</h3>
                <button type="submit" class="w-full flex items-center px-3 py-2 rounded-lg transition-all delay-75  bg-global-700 text-global-100 hover:bg-global-500 hover:border-global-500">
                    <div class="w-fit mx-auto flex items-center">
                        <svg class="w-5 h-5 mx-1 text-red-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd"/>
                        </svg>
                        Completar Pago
                    </div>
                </button>
            </section>
        </form>
    </section>
@endsection

@push('child-scripts')
    <script>
        window.onload = function() {
            $('#new_payment_form').submit();
        };
    </script>
@endpush