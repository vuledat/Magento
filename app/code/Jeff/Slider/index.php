<?php

function sign($method, $url, $data, $consumerSecret, $tokenSecret)
{
    $url = urlEncodeAsZend($url);
    $data = urlEncodeAsZend(http_build_query($data, '', '&'));
    $data = implode('&', [$method, $url, $data]);
    $secret = implode('&', [$consumerSecret, $tokenSecret]);

    return base64_encode(hash_hmac('sha1', $data, $secret, true));
}

function urlEncodeAsZend($value)
{
    $encoded = rawurlencode($value);
    $encoded = str_replace('%7E', '~', $encoded);
    return $encoded;
}

$consumerKey = 'rgh0gwf91yc3ev49up9x2ykmoaf71xud';
$consumerSecret = 'jrymmimkjo6gpu2we80xi0be49kphtx6';
$accessToken = 'olp9wq1978ysgrr1atur9xis4q4o88rv';
$accessTokenSecret = '39k8eaomlgk7vu73o0hjqrbmed5eaak1';

$method = 'GET';

$url = "http://localhost/magento/index.php/rest/V1/jeffSliderSlide/3";

$data = [
    'oauth_consumer_key' => $consumerKey,
    'oauth_nonce' => md5(uniqid(rand(), true)),
    'oauth_signature_method' => 'HMAC-SHA1',
    'oauth_timestamp' => time(),
    'oauth_token' => $accessToken,
    'oauth_version' => '1.0',
];

$data['oauth_signature'] = sign($method, $url, $data, $consumerSecret, $accessTokenSecret);
//echo $data['oauth_signature'], "\n";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => [
        'Authorization: OAuth ' . http_build_query($data, '', ',')
    ]
]);


$result = curl_exec($curl);

var_dump($result);


curl_close($curl);