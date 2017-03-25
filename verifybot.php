<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$access_token = '9pnEWl9BaXKZz0GhxcccudVVl5fSVFcK4jSPGZMcfB+dAm9N2kinxjFGuu4/a8dlJKmE6JzSAZMuJxsReqlW7KDSHs3Nk/JUnZAQ/FCIPKdh9GJR3dAGT0IcaI/EtAEQs7+L7/NKH3zzyIoU5BSvdAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;