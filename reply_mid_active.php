<?php
function insert_data_tb($mid){
    $chAdd = curl_init();
          curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/line_member?mid='.$mid.'&line_name=ffon_test'.'&image=image'.'&add_by=1');
          curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
                                        )
          );
          $result = curl_exec($chAdd);
          $err    = curl_error($chAdd);
          curl_close($chAdd);
}

function get_mid()
{
    $strAccessToken = "XDEio/U+1tLcglINRntoiWnm3xBRzApRnLm5FHhpqHGEtU21j01yqjlxr83equ5W6qVYXGI80LOObJe1H9EaoK4ZfSiSHwpUrRgQxlREc/aSZQavLqwyHsT1rDcxjzf9ekwtwN1VXkZsCGo9bRxI5AdB04t89/1O/w1cDnyilFU=";
 
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
 
    $strUrl = "https://api.line.me/v2/bot/message/reply";
 
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
  
 
    if ($arrJson['events'][0]['message']['text'] == "a") {
          $arrPostData = array();
          $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
          $arrPostData['messages'][0]['type'] = "text";
          $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
         $get_mid =  $arrJson['events'][0]['source']['userId'];

         insert_data_tb($get_mid);
    }
 
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);

    var_dump($result);
    var_dump($get_mid);
}