<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost/crud/index.php/api/Colaboradores',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: crud@2022',
    'Authorization: Basic Q1JVRDpDUlVE',
    'Cookie: ci_session=51vpdl5q734t6vpb9sq3f34d4veiokfs'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;