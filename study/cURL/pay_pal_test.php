<?php
include_once('curl_functions.php');
$arrayOfHeaders = array("X-PAYPAL-SECURITY-USERID: caller_1312486258_biz_api1.gmail.com",
"X-PAYPAL-SECURITY-PASSWORD: 1312486294",
"X-PAYPAL-SECURITY-SIGNATURE: AbtI7HV1xB428VygBUcIhARzxch4AL65.T18CTeylixNNxDZUu0iO87e",
"X-PAYPAL-REQUEST-DATA-FORMAT: JSON","X-PAYPAL-RESPONSE-DATA-FORMAT: JSON",
"X-PAYPAL-APPLICATION-ID: APP-80W284485P519543T",
);
$url = "https://svcs.sandbox.paypal.com/AdaptivePayments/Pay";

//JSON STRING NOT ARRAY::: $arrayOfData = array("{\"actionType\":\"PAY\", \"currencyCode\":\"USD\", \"receiverList\":{\"receiver\":[{\"amount\":\"1.00\",\"email\":\"rec1_1312486368_biz@gmail.com\"}]}, \"returnUrl\":\"http://www.example.com/success.html\", \"cancelUrl\":\"http://www.example.com/failure.html\", \"requestEnvelope\":{\"errorLanguage\":\"en_US\", \"detailLevel\":\"ReturnAll\"}}");

$array =  array('method' => 'get_users', 'secret' => '!9966youllNeverKnowEat1100!' ) ;
echo("<br>Post:" . curl_post($url, $arrayOfHeaders));
/*
 * curl -s --insecure -H  -H  -H  -H   -H  -H    -d "{\"actionType\":\"PAY\", \"currencyCode\":\"USD\", \"receiverList\":{\"receiver\":[{\"amount\":\"1.00\",\"email\":\"rec1_1312486368_biz@gmail.com\"}]}, \"returnUrl\":\"http://www.example.com/success.html\", \"cancelUrl\":\"http://www.example.com/failure.html\", \"requestEnvelope\":{\"errorLanguage\":\"en_US\", \"detailLevel\":\"ReturnAll\"}}"
 * 
 */
?>