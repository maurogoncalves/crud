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
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'nomeCompleto=teste&cpf=173.865.928-31&email=a%40a.com.br&rg=1111111111&data_nasc=2000-01-01&cep=13.806-404&endereco=rua&numero=33&cidade=cidade&estado=MG',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: crud@2022',
    'Authorization: Basic Q1JVRDpDUlVE',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: ci_session=htjr2afuv44sm1kpaukcovsuv1me43r0'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
