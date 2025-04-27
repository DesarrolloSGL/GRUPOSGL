<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', '3bfe54dc7d954e34a6895986ec76c9553b6cf8a9ef2a4b12985da2466cad99ce5e2bc4cf37a7432a926b257d5ad768a208be2da4684b4c05b63cc0ebf55d3854364c6a4b62cf4b12bd9781da029a382eed4ea8a6de154fbf9e155933be598019ab630497c80d4faa847fbbc0cbba41a3a357a44e9a2544d49df3fd52f003d4a9');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
