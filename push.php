<?php
$proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
 
$strAccessToken = "Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
// $arrHeader = array();
// $arrHeader[] = "Content-Type: application/json";
// $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
// $arrPostData = array();
// $arrPostData['to'] = "fozenffon";
// $arrPostData['messages'][0]['type'] = "text";
// $arrPostData['messages'][0]['text'] = "Test Push Message";

//-----------------------------------------
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '2016f3f7fb001c7f38154a3fe3f3202c']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('fozenffon', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

//-------------------------------------
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpClient);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($textMessageBuilder));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close ($ch);
echo "ok";
?>