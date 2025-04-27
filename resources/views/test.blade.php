@extends('layouts.clean')

@section('content')

    <section class="min-h-screen w-[90%] sm:w-full mx-auto">
        <div class="my-32 w-fit px-[1%] py-20  mx-auto bg-blue-50 rounded-lg">
            <h3 class="text-center font-bold">Tipo de Pago Tarjeta de Crédito/Débito</h3>
            <h3 class="text-center text-2xs font-bold sm:text-xs">Modúlo de prueba para la implementación de cybersource</h3>
            <div class="text-justify text-2xs px-5 my-5 space-y-1 sm:text-xs">
                <h3>- Valida número de tarjeta válido(Algoritmo Luhn).</h3>
                <h3>- Verifica si la fecha de expiración es válida. </h3>
                <h3>- No guarda ningún dato sensible del tarjetahabiente(CCV, Fecha de expiración).</h3>
                <h3>- El campo de la tarjeta de crédito debe permitir un máximo de 19 dígitos.</h3>
                <h3>- El campo CCV permite un máximo de 4 dígitos y va enmascarado.</h3>
                <h3>- El formularío debe refrescarse si la transacción fue denegada.</h3>
            </div>
            <form id="payment_form" action="payment/payment_confirmation.php" method="post" autocomplete="off">
                {{-- @csrf --}}
                <br>
                <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
                <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
                <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
                <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
                <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
                <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                <input type="hidden" name="locale" value="en">
                <fieldset>
                    <div id="home_cn_payment_cc" class="w-11/12  py-5 px-3 space-y-3 bg-white mx-auto rounded-md">
                        <div class="flex justify-start space-x-1 border border-gray-200 rounded-lg">
                            <input name="card_name" type="text" placeholder="Name" class="key-only-alpha text-sm w-full text-gray-500 h-10 rounded-md border-transparent focus:border-transparent focus:ring-0 uppercase" value="Kevin" autocomplete="off" required>
                            <input name="card_last_name" type="text" placeholder="Last Name" class="key-only-alpha text-sm w-full text-gray-500 h-10 rounded-md border-transparent focus:border-transparent focus:ring-0 uppercase" value="Armas" autocomplete="off" required>
                        </div>
                        <div class="flex border border-gray-200  items-center h-12 rounded-lg">
                            <input id="card_number" type="text" name="card_number" class="key-only-number w-8/12 text-xs  text-gray-500 border-transparent focus:border-transparent focus:ring-0" placeholder="Card Number" value="4111111111111111"  autocomplete="off" maxlength="19" required>
                            <input id="card_expiration" type="text" name="card_expiry_date" class="key-only-number text-2xs text-center  text-gray-500 p-0 w-2/12 border-transparent focus:border-transparent focus:ring-0 sm:text-xs" value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
                            <input id="card_csv" type="password" name="card_cvn" class="key-only-number text-2xs text-center  text-gray-500 p-0 w-2/12 border-transparent focus:border-transparent focus:ring-0 sm:text-xs" placeholder="CSV"  value="" autocomplete="off" maxlength="4" >
                        </div>
                        <legend>Payment Details</legend>
                        <div id="paymentDetailsSection" class="section">
                            <input id="card_type" type="text" name="card_type" class="key-only-number w-8/12 text-xs  text-gray-500 border-transparent focus:border-transparent focus:ring-0" placeholder="Card Type" value="001" autocomplete="off">
                            <span class="font-bold text-sm">transaction_type:</span><input class="border-gray-200 rounded-lg block" type="text" name="transaction_type" size="25"><br/>
                            <span class="font-bold text-sm">reference_number:</span><input class="border-gray-200 rounded-lg  block" type="text" name="reference_number" size="25"><br/>
                            <span class="font-bold text-sm">amount:</span><input class="border-gray-200 rounded-lg  block" type="text" name="amount" size="25"><br/>
                            <span class="font-bold text-sm">currency:</span><input class="border-gray-200 rounded-lg  block" type="text" name="currency" size="25"><br/>
                        </div>
                        <div id="paymentBillingSection">
                            <input type="text" name="bill_to_forename" value="Kevin">
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
                            <input type="text" name="customer_lastname" value="Armas">
                        </div>
                        <input class="wait" type="submit" id="submit" name="submit" value="Submit"/>
                        {{-- <button id="card_sumbit_btn" type="submit" class="bg-blue-700 text-white px-3 py-2 rounded-lg block ml-auto text-sm">Pay</button> --}}
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
{{-- The request data did not pass the required fields check for this application:
[bill_address1, bill_city, bill_country, customer_email, customer_lastname] --}}

@push('child-scripts')
    <script type="text/javascript" src="{{asset('js/payment_form.js')}}"></script>
    <script>
        $('#card_number').keyup(function(e){
            const inputValue = e.target.value.replaceAll(" ","");
            if(e.keyCode != 8){
                e.target.value = inputValue.replace(/(\d{4})?(\d{4})?(\d{4})?(\d{0,4})?/, "$1 $2 $3 $4");
            }

            clearValidationError(this);
            singleInputNavigation(e,19);
            if(e.target.value.length >18){
                luhnValidation(e)? true: cardValidationError(e,'Card Number Invalid');
            }
        });

        $('#card_expiration').keyup(function(e){
            const inputValue = e.target.value.replaceAll("/","");

            if(e.keyCode != 8){
                e.target.value = inputValue.replace(/(\d{2})(\d{0,2})?/, "$1/$2");
            }

            clearValidationError(this);
            singleInputNavigation(e,5);
            if(e.target.value.length >4){
                dateValidation(e)? true:cardValidationError(e,'Card Number Invalid');
            }
        });

        $('#card_csv').keyup(function(e){
            singleInputNavigation(e);
        });

        function cardValidationError(_e,_msg){
            $(_e.target).addClass('text-red-500');
            $(_e.target).parent().addClass('border-red-500');
        }

        function clearValidationError(_this){
           $(_this).hasClass('text-red-500')? $(_this).removeClass('text-red-500'):false;
           $(_this).parent().hasClass('border-red-500')? $(_this).parent().removeClass('border-red-500'):false;
        }

        // Validación de fecha
        function dateValidation(_e){
            const month = _e.target.value.split('/')[0];
            const year = _e.target.value.split('/')[1];

            const new_date = new Date();
            const new_month = new_date.getMonth()+1;
            const new_year = new_date.getFullYear() % 100;

            let valid = true;

            if(year < new_year) valid = false;

            if(month > 13) valid = false;

            if(year == new_year && month < new_month) valid = false;

            return valid;
        }

        // Algoritmo Luhn
        function luhnValidation(_e) {
            const card_number = _e.target.value.replaceAll(" ","");

            if (/[^0-9-\s]{16}/.test(card_number)) return false;

            let nCorrelative = 0, isEven = false;

            for (var n = card_number.length - 1; n >= 0; n--) {
                var cDigit = card_number.charAt(n),
                nDigit = parseInt(cDigit, 10);
                if (isEven && (nDigit *= 2) > 9) nDigit -= 9; nCorrelative +=  nDigit; isEven = !isEven;
            }

            return (nCorrelative % 10) == 0;
        }

        function singleInputNavigation(_e,_max_length){
            if(_e.keyCode == 8){
                _e.target.value  == "" ? $(_e.target).prev().focus():false;
            };
            if(_e.target.value.length  == _max_length){
                if ((_e.keyCode >= 48 && _e.keyCode <= 57) || (_e.keyCode >= 96 && _e.keyCode <= 105) ) {
                    $(_e.target).next().focus();
                }
            }
        }


        $('.key-only-number').keypress(function (e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
        });

        $('.key-only-alpha').keypress(function (e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^a-zA-Z]/g))
            return false;
        });

        $('#card_sumbit_btn').click(function(){
            // form validations



            // if validator submit form
            // this.closest('form').submit();
        });
    </script>
@endpush


@endsection

