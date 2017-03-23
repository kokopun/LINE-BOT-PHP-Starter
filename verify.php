<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$access_token = 'Dhs/TAId7FiwLOfTtzMobtuMH1qTeKMhinhMagfXxwyFGdMeiMFvU1FDMYoawd8g4gG6zA4ccoqyXTfCPQFD/V8ZY2Mgr1PKPYR+AqXqs8zD3ftNbJEGbr1Z2vX+WwuKRMsEs/zTclZy8xf2coG2IgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;