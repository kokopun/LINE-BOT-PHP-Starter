<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
$access_token = 'Dhs/TAId7FiwLOfTtzMobtuMH1qTeKMhinhMagfXxwyFGdMeiMFvU1FDMYoawd8g4gG6zA4ccoqyXTfCPQFD/V8ZY2Mgr1PKPYR+AqXqs8zD3ftNbJEGbr1Z2vX+WwuKRMsEs/zTclZy8xf2coG2IgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
                             $text_ex = explode(' ', $text);
    
                        $responeText ="ไม่เข้าใจ";
                        
                          if(strpos($text_ex[0], 'สวัสดีวันเสาร์') !== false){
                            $responeText = "สวัสดีวันเสาร์ ลดเศร้า ลดเค็ม ^^";
                            
                        }
                        
                       elseif(strpos($text_ex[0], 'สวัสดี') !== false){
                            $responeText = "สวัสดีครับ CKD Care Bot ยินดีให้บริการทุกท่าน ^^";
                            
                        } 
                        
                        elseif(strpos($text_ex[0], "ทำอะไร") !== false){
                                               
                         $responeText = "คิดถึงและห่วงใยคุณอยู่ครับ" ;

                        }
                         elseif(strpos($text_ex[0], "ปุยหนัก")!== false){
                                               
                         $responeText = "ปุยมันอ้วน หนักตั้ง" . $text_ex[1] ;

                        }
                        
                         elseif(strpos($text_ex[0], "นํ้าหนัก")!== false){
                                               
                         $responeText = "นํ้าหนักของคุณคือ" . $text_ex[1] ;

                        }
                          elseif(strpos($text_ex[0], "หนัก")!== false){
                                               
                         $responeText = "นํ้าหนักของคุณคือ" . $text_ex[1] ;

                        }
                        
                        
                            elseif(strpos($text_ex[0], "ส่วนสูง")!== false){
                                               
                         $responeText = "ส่วนสูงของคุณคือ" . $text_ex[1] ;

                        }
                                 elseif(strpos($text_ex[0], "สูง")!== false){
                                               
                         $responeText = "ส่วนสูงของคุณคือ" . $text_ex[1] ;

                        }
                        
                        
                      elseif(strpos($text_ex[0], "เข้า")!== false){
                                               
                         $responeText = "นํ้ายาเข้า "  . $text_ex[1] ;

                        }
                        
                        elseif(strpos($text_ex[0], "ออก")!== false){
                                               
                         $responeText = "นํ้ายาออก "  . $text_ex[1] ;

                        }   
                            elseif(strpos($text_ex[0], "น่ารัก")!== false){
                                               
                         $responeText = "เขินจัง ขอบคุณครับ"   ;

                        }   
                          elseif(strpos($text_ex[0], "หุ่น")!== false || strpos($text_ex[0], "รูปร่าง")!== false || strpos(strtolower( $text_ex[0]), "bmi")!== false  ){
                                               
                             $temp1 =floatval($text_ex[1]);
                             $temp2 =floatval($text_ex[2]);
                             
                             if($temp1>$temp2){
                                 
                                 $bmi = $temp2/pow(($temp1/100),2);
                             }else{
                                $bmi = $temp1/pow(($temp2/100),2);

                                 
                             }
                             
                             $bmi = number_format($bmi, 2, '.', '');             
     
                         $responeText = "ค่า BMI : "  . $bmi ;

                        }
                           elseif(strpos($text_ex[0], "?")!== false){
                                               
                         $responeText = "ระบบช่วยเหลือ"   ;

                        }   
                        
                        
                        else{
                            
                         $responeText = "ไม่เข้าใจ" ;

                        }
			
                        // Build message to reply back
			$messages1 = ['type' => 'text',
				'text' => $responeText,
                            ];
                        
                        $messages2 = [
                            'type' => 'text',
                          'text' => " ดาวโหลด CKD App \r\n https://play.google.com/store/apps/details?id=org.thaicarecloud.cdk.ckd_pd&hl=en"
                            ];
                        
                        $messages = [$messages1,$messages2 ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => $messages,
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

	

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";

		}
                else{
                        $replyToken = $event['replyToken'];
                        
                        $messages2 = [
                            'type' => 'text',
                          'text' => " ดาวโหลด CKD App \r\n https://play.google.com/store/apps/details?id=org.thaicarecloud.cdk.ckd_pd&hl=en"
                            ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages2],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
               
	$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		

	}
            }
    }