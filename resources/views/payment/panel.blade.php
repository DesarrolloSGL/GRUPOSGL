@extends('layouts.app')


@section('content')
    <section class="min-h-screen bg-gray-50 flex">
        <div class="p-5 bg-white border mx-auto my-auto">
            <div class="bg-green-300">
                <h3 class="text-blue-900 text-lg">Orden {{$order->order_number}}</h3>
                <h3 class="text-sm">{{$order->created_at}}</h3>
            </div>

            <div class="bg-green-400">
                {{$payment}}
                <h3>{{$payment->currency}}.{{$payment->total}}</h3>
            </div>
            <h3 class="text-xs font-bold">Todos los precios incluyen IVA</h3>
            <div class="bg-green-500 flex">
                <button class="px-3 py-2 whitespace-nowrap">Pago con Tarjeta</button>
                <button class="px-3 py-2 whitespace-nowrap">Transferencia Bancaria</button>
            </div>
            <img class="ml-auto w-12" src="{{asset('images/main/logo.png')}}" alt="">
        </div>
    </section>
@endsection

@push('child-scripts')
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/payment_form.js')}}"></script>
@endpush

{{--
<form id="payment_form" action="/payment/payment_confirmation.php" method="post" >
    <input type="hidden" name="access_key" value="ad4c7bd7c796318ca0dc9b8ae9257fa8">
    <input type="hidden" name="profile_id" value="A75FC721-F40E-4113-BB77-9259531E5324">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
    <input type="hidden" name="unsigned_field_names" value="card_name,card_last_name,card_number,card_expiry_date,card_cvn">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset hidden>
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25" value="sale"><br/>
            <span>reference_number:</span><input type="text" name="reference_number" size="25" value="123465432"><br/>
            <span>amount:</span><input type="text" name="amount" size="25" value="100.00"><br/>
            <span>currency:</span><input type="text" name="currency" size="25" value="USD"><br/>
            <input name="card_name" type="text" placeholder="Name"  value="" autocomplete="off" >
            <input name="card_last_name" type="text" placeholder="Last Name"  value="" autocomplete="off" >
            <input id="card_number" type="text" name="card_number"  placeholder="Card Number" value=""  autocomplete="off" maxlength="19" >
            <input id="card_expiration" type="text" name="card_expiry_date"  value="" placeholder="MM/YY"  autocomplete="off" maxlength="5" >
            <input id="card_csv" type="password" name="card_cvn"  placeholder="CSV"  value="" autocomplete="off" maxlength="4" >
        </div>
    </fieldset>
    <button type="submit" class="px-3 py-2 border border-gray-400 rounded-md bg-gray-50 text-gray-950 text-sm  hover:bg-gray-300">Pago Con Tarjeta</button>
</form> --}}