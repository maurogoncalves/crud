<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost/crud/index.php/api/Cadastrar_Salario',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'user_id=2&salario=2200.00',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: crud@2022',
    'Authorization: Basic Q1JVRDpDUlVE',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: ci_session=im3mu706ng726b2r20f162mib2hikd84'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
