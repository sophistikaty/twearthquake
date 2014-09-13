<?php

//Sourced from http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1/15314662#15314662

require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "180393015-rGtA7Vq5DaPc04gUYU1frMjX2KoYIOvxADk0FeJl",
    'oauth_access_token_secret' => "YdwzLh98pr0hZKnaml5d0cbbfIMvpRMQzNDpSNrBEgLTvY",
    'consumer_key' => "3AbiBJblgc4zLG4VEEWkW16eO",
    'consumer_secret' => "SXR8W6X2io3vipEEuPnF8mAJBnDcfnR4owNWhDNUw3NpP9XgJK"
);

/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json?q=earthquake';
$getfield = "hashtags":  "[#earthquake]",
	    	"result_type": "recent",;
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(); 

// $url = 'https://api.twitter.com/1.1/search/tweets.json?q=earthquake';
// $getfield = '?username=J7mbo&skip_status=1';
// $requestMethod = 'GET';
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
//              ->buildOauth($url, $requestMethod)
//              ->performRequest();


// alternate option---------

// <?php

function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

    $url = "https://api.twitter.com/1.1/search/tweets.json?q=earthquake";

    $oauth_access_token = "180393015-rGtA7Vq5DaPc04gUYU1frMjX2KoYIOvxADk0FeJl";
    $oauth_access_token_secret = "YdwzLh98pr0hZKnaml5d0cbbfIMvpRMQzNDpSNrBEgLTvY";
    $consumer_key = "3AbiBJblgc4zLG4VEEWkW16eO";
    $consumer_secret = "SXR8W6X2io3vipEEuPnF8mAJBnDcfnR4owNWhDNUw3NpP9XgJK";

    $oauth = array( 'count' => 7,
    				'oauth_consumer_key' => $consumer_key,
                    'oauth_nonce' => time(),
                    'oauth_signature_method' => 'HMAC-SHA1',
                    'oauth_token' => $oauth_access_token,
                    'oauth_timestamp' => time(),
                    'oauth_version' => '1.0');

    $base_info = buildBaseString($url, 'GET', $oauth);
    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;

    // Make requests
    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array( CURLOPT_HTTPHEADER => $header,
                      //CURLOPT_POSTFIELDS => $postfields,
                      CURLOPT_HEADER => true,
                      CURLOPT_URL => $url,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_SSL_VERIFYPEER => false);

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    $twitter_data = json_decode($json); 