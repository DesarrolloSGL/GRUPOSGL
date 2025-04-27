<?php include 'security.php' ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GrupoSGL</title>
        <!-- <link rel="stylesheet" type="text/css" href="payment.css"/> -->
        <link href="../css/payment.css"  rel="stylesheet">
    </head>
<body class="">

    <form class="container" id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="POST"/>
        <?php
            foreach($_REQUEST as $name => $value) {
                $params[$name] = $value;
            }

            session_start();
            if(($_SESSION[$params['reference_number']])) {
                unset($_SESSION[$params['reference_number']]);
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

            if($_SESSION['total']) {
                $total = $_SESSION['total'];
                unset($_SESSION['total']);
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        ?>
        <div class="receipt_header">
            <h1>Resumen de Pago <span>GrupoSGL</span></h1>
            <h2>5ta. Avenida 15-45 Zona 10 Edificio Centro Empresarial <span>+502 2379-0640</span></h2>
            <div class="date_time_con">
                <div class="date">
                    <?php
                        echo date("d/m/Y") . "<br>";
                    ?>
                </div>
                <div class="time">
                    <?php
                        date_default_timezone_set("America/Guatemala");
                        echo date("h:i:sa");
                    ?>
                </div>
            </div>
        </div>

        <div id="confirmation" class="receipt_body">

            <div style="font-weight: bold;font-size: 20px;">
                <?php
                    if(isset($params['reference_number'])){
                        echo $params['reference_number'];
                    }
                ?>
            </div>
            <div class="items">
                <table>
                    <?php if(false){'<thead> <th>QTY</th><th>ITEM</th><th>AMT</th></thead><tbody><tr><td>1</td><td>Lorem ipsum</td><td>2.3</td></tr></tbody>';}?>
                    <tfoot>
                        <tr>
                            <td>SubTotal</td>
                            <td></td>
                            <td>
                                <?php
                                    if(isset($params['currency_symbol']) && isset($params['amount'])){
                                        echo $params['currency_symbol'];
                                        echo number_format((float)$params['amount']-$params['amount']*0.12, 2, '.', '');
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>IVA</td>
                            <td></td>
                            <td>
                                <?php
                                    if(isset($params['currency_symbol']) && isset($params['amount'])){
                                        echo $params['currency_symbol'];
                                        echo number_format((float)$params['amount']*0.12, 2, '.', '');
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td>
                                <?php
                                    if(isset($params['currency_symbol']) && isset($params['amount'])){
                                        echo $params['currency_symbol'];
                                        echo '&nbsp';
                                        echo number_format((float)$params['amount'], 2, '.', '');
                                    }
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <input class="button-confirmation-payment" type="submit" name="submit" id="submit" value="Continuar"/>
            <input class="button-confirmation-payment" type="button" value="Cancelar" onClick="javascript:history.go(-1)"/>

        </div>

        <?php
            if(isset($params)){
                foreach($params as $name => $value) {
                    if($name == 'reference_number' || $name == 'amount' || $name == 'currency'){

                    }else{
                        echo "<div hidden>";
                        echo "<span class=\"fieldName\">" . $name . "</span><span class=\"fieldValue\">" . $value . "</span>";
                        echo "</div>\n";
                    }
                }
            }
        ?>

        <?php
            if(isset($params)){
                foreach($params as $name => $value) {
                    if($name == 'amount'){
                        echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $total . "\"/>\n";
                    }else{
                        echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                    }
                }
                echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
            }
        ?>
    </form>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
